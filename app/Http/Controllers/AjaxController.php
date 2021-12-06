<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AjaxController extends Controller
{
    public function userLogin(Request $request){

         $rules = [
            'email'    => 'required|email',
            'password' => 'required',
         ];
  
         $validator = \Validator::make($request->all(), $rules);
        
         if($validator->fails()){
             return array('status' => 'error' , 'message' => __('failed to register') , 'errors' => $validator->errors());
         }

         if (!Auth::attempt(['email'=>$request->email,'password'=>$request->password,'register_type'=>'Manually'])){
               return ['status' => 'failed' , 'message' => __('Invalid Credentials') ];
         }

         return ['status' => 'success' , 'message' => __('Loggedin successful') ];
    }

    public function userRegister(Request $request){
        
       $rules = [
          'email'    => 'required|email|unique:users,email',
          'password' => 'required|string|min:6|confirmed',
        ];

        $validator = \Validator::make($request->all(), $rules);
      
        if($validator->fails()){
           return array('status' => 'error' , 'message' => __('failed to register') , 'errors' => $validator->errors());
        }
        
        $user = new User;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->register_type = 'Manually';
        
        if($user->save()){
          Auth::login($user);
          return ['status' => 'success' , 'message' => __('Account created') ];
        }
          return ['status' => 'failed' , 'message' => __('Failed to create account') ];
    }

    public function userUpdateProfile(Request $request){

          $rules = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email,'.Auth::id().',id,register_type,Manually',
          ];

          if($request->phone){
             $rules['phone'] = 'unique:users,phone,'.Auth::id().',id';
          }
  
          $validator = \Validator::make($request->all(), $rules);
        
          if($validator->fails()){
             return array('status' => 'error' , 'message' => __('failed to update profile') , 'errors' => $validator->errors());
          }

          $profileImage = null;
          if ($request->file('profile_image')) {
            $profileImage = time(). \Auth::user()->id.'.png';
            $request->profile_image->move(public_path('upload/profile/'), $profileImage);
          }
          
          $user = User::find(Auth::id());
          $user->first_name = $request->first_name;
          $user->last_name  = $request->last_name;
          $user->name  = $request->first_name .' '. $request->last_name;
          $user->email = $request->email;
          $user->phone = $request->phone;
          $preProfileFileImage = $user->profile_image;
          if($profileImage){
            $user->profile_image = $profileImage;
          }
          if($user->update()){
            if($profileImage && $preProfileFileImage){
                $this->unlinkFile(public_path('upload/profile/' . $preProfileFileImage ));
            }
            return ['status' => 'success' , 'message' => __('Profile updated successful') , 'data' => $user ];
          }
            if($profileImage){
              $this->unlinkFile(public_path('upload/profile/' . $profileImage ));
            }
            return ['status' => 'failed' , 'message' => __('Failed to update profile') ];
    }
}
