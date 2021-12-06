<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','googleLogin','googleCallback');
    }

      public function googleLogin(Request $request){
        return Socialite::driver('google')->redirect();
      }
  
      public function googleCallback(Request $request){

         $googleUser = Socialite::driver('google')->stateless()->user();
         $user       = User::where('social_id',$googleUser->id)->first();

         if(empty($user) || is_null($user)){
             $user = new User;
         }
            $nameArr = explode(' ',$googleUser->name);
            $user->social_id  = $googleUser->id;
            $user->first_name = $nameArr[0] ?? NULL;
            $user->last_name  = $nameArr[1] ?? NULL;
            $user->name       = $googleUser->name;
            $user->email      = $googleUser->email;
            $user->register_type  = 'Google';
            $user->save();
            if($googleUser->avatar){
                if(empty($user->profile_image) || is_null($user->profile_image)){
                    $profileImage = time() . $user->id . '.png';
                    file_put_contents('public/upload/profile/' . $profileImage ,file_get_contents($googleUser->avatar));
                    $user->profile_image = $profileImage;
                    $user->update();
                }    
             }
         Auth::login($user);
         return redirect()->route('index');
           
      }
}
