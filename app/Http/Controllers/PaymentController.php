<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;
use Auth;

class PaymentController extends Controller
{

    public $client = null;

    public function __construct(){

        $this->middleware('auth');

        $this->client = new \GoCardlessPro\Client(array(
            'access_token' => 'sandbox_gl4UL2GMx 2I1iyD-hBwHVUs2WC3s8Y4TCdc_Ql5s',
            'environment'  => \GoCardlessPro\Environment::SANDBOX
          ));

    }

    public function buyNow($id){

      $plan = Plan::find($id);
      $user = User::find(Auth::id());
      $preSubscription = Subscription::where('user_id',$user->id)->where('subscription_status','1')->first();

      if(empty($user->mandate_id) || is_null($user->mandate_id)){
         $response = $this->createMandate($user);
         if($response['status']){
             Session::put('plan_id',$id);
             return redirect($response['redirectflow_url']);
         }else{
             return back()->with('status',false)->with('message','Failed to buy');
         }
      }
       
      $intervalUnit = 'monthly';
      $amount       = $plan->monthly;

      try{
          $response = $this->client->subscriptions()->create([
            "params" => [
                            "amount" => $amount * 100,
                            "currency" => "GBP",
                            "name" => $plan->title,
                            "interval_unit" => $intervalUnit,
                            "day_of_month" => 1,
                            "metadata" => ["order_no" => "ABCD1234"],
                             "links" => ["mandate" => $user->mandate_id]
                         ]
          ]);
         $response = json_encode($response);
         $response = json_decode($response);
         if($response->api_response->status_code == '201'){
              $subscriptionId = $response->api_response->body->subscriptions->id;
              $subscription = new Subscription;
              $subscription->subscription_id = $subscriptionId;
              $subscription->user_id = $user->id;
              $subscription->plan_id = $plan->id;
              $subscription->plan_title = $plan->title;
              $subscription->plan_property = $plan->property;
              $subscription->subscription_date   = date('Y-m-d');
              $subscription->subscription_status = '1';
              $subscription->save();

              if($preSubscription){
                $response = $this->client->subscriptions()->cancel($preSubscription->subscription_id);
                $response = json_encode($response);
                $response = json_decode($response);
                if($response->api_response->status_code == '200' && $response->api_response->body->subscriptions->status == 'cancelled' ){
                   $subscriptionId = $response->api_response->body->subscriptions->id;
                   $preSubscription->subscription_status = '2';
                   $preSubscription->subscription_cancel_date = date('Y-m-d H:i:s');
                   $preSubscription->update();
                }
              };

              return redirect()->route('plan.index')->with('status',true)->with('message','Plan Activated Successful');
         }
         return $response['api_response'];
      }catch(\Exception $e){
            return redirect()->route('plan.index')->with('status',false)->with('message',$e->getMessage());
      }

    }

    public function createMandate($user){

        try{

            $redirectFlow = $this->client->redirectFlows()->create([
                "params" => [
                    // This will be shown on the payment pages
                    "description" => "Wine boxes",
                    // Not the access token
                    "session_token" => Session::getId(),
                    "success_redirect_url" => url('/gocardless/host/mandate/success'),
                    // Optionally, prefill customer details on the payment page
                    "prefilled_customer" => [
                      "given_name" => $user->first_name,
                      "family_name" => $user->last_name,
                      "email" => $user->email,
                      "address_line1" => $user->address,
                      "city" => $user->city,
                      "postal_code" => $user->postal_code
                    ]
                ]
            ]);

            return array(
                        'status'  => true,
                        'message' => 'Success',
                       'redirectflow_url'=> $redirectFlow->redirect_url,
                       'redirectflow_id' => $redirectFlow->id
            );
             
        }catch(\Exception $e){
            return array(
              'status'  => false,
              'message' => $e->getMessage()
            );
        }
        
    }

    public function mandateSuccess(Request $request){
        $redirectFlow = $this->client->redirectFlows()->complete(
            $request->redirect_flow_id, //The redirect flow ID from above.
            ["params" => ["session_token" => Session::getId() ]]
        );
        
        $user = User::find(Auth::id());
        $user->mandate_id =  $redirectFlow->links->mandate;
        $user->update();
        $id = Session::get('plan_id');
        return redirect()->route('payment.buyNow',$id);  
     }

     public function subscriptionCancel($id){
         try{
             $subscription = Subscription::find($id);
             $response = $this->client->subscriptions()->cancel($subscription->subscription_id);
             $response = json_encode($response);
             $response = json_decode($response);
             if($response->api_response->status_code == '200' && $response->api_response->body->subscriptions->status == 'cancelled' ){
                $subscriptionId = $response->api_response->body->subscriptions->id;
                $subscription->subscription_status = '2';
                $subscription->subscription_cancel_date = date('Y-m-d H:i:s');
                $subscription->update();
                return back()->with('status',true)->with('message','Plan Cancelled Successful');
           }
         }catch(\Exception $e){
             return back()->with('status',false)->with('message',__('Failed to cancel plan'));
         }
     }

}
