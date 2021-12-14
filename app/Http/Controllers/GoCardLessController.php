<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GoCardLessController extends Controller
{

    public $client = null;

    public function __construct(){
        $this->client = new \GoCardlessPro\Client(array(
            'access_token' => 'sandbox_gl4UL2GMx2I1iyD-hBwHVUs2WC3s8Y4TCdc_Ql5s',
            'environment'  => \GoCardlessPro\Environment::SANDBOX
          ));
    }

    public function createMandate($payload){
        $payload = (Object) $payload;

        try{

            $redirectFlow = $this->client->redirectFlows()->create([
                "params" => [
                    // This will be shown on the payment pages
                    "description" => "Wine boxes",
                    // Not the access token
                    "session_token" => $payload->session_id,
                    "success_redirect_url" => url('/gocardless/mandate/success'),
                    // Optionally, prefill customer details on the payment page
                    "prefilled_customer" => [
                      "given_name" => $payload->first_name ?? '',
                      "family_name" => $payload->last_name ?? '',
                      "email" => $payload->email ?? '',
                      "address_line1" => $payload->address ?? '',
                      "city" => $payload->city ?? '',
                      "postal_code" => $payload->postal_code ?? ''
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

    public function createSubscription($payload){
        $payload = (object) $payload;
        $intervalUnit = $payload->intervalUnit;
        $amount       = $payload->amount;
        $name         = $payload->name;
        $mandateId    = $payload->mandateId;
        $orderId      = $payload->orderId;
        try{
            $response = $this->client->subscriptions()->create([
              "params" => [
                              "amount"   => $amount * 100,
                              "currency" => "GBP",
                              "name"     => $name,
                              "interval_unit" => $intervalUnit,
                              "day_of_month"  => 1,
                              "metadata" => [ "order_no" => $orderId ],
                              "links"    => [ "mandate"    => $mandateId]
                           ]
            ]);
           $response = json_encode($response);
           $response = json_decode($response);
           if($response->api_response->status_code == '201'){
                 return ['status'=>true,'message'=> 'Success' , 'data' => $response ];
           }
        }catch(\Exception $e){
            return ['status'=>false,'message'=>$e->getMessage()];
        }
    }

    public function getMandateId($redirectFlowId,$sessionId){
        try{
            $redirectFlow = $this->client->redirectFlows()->complete(
                $redirectFlowId,
                ["params" => [ 'session_token' => $sessionId ]]
            );
            return ['status'=>true,'message'=>'Success','mandateId'=>$redirectFlow->links->mandate];
        }catch(\Exception $e){
            return ['status'=>false,'message'=> $e->getMessage()];
        }
    }

}
