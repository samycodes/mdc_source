<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Objects\APIKey;
use App\Objects\AccessToken;
use Mail;
use App\User;

class LoginController extends Controller
{
    public function getApiKey(Request $request)
	{
        try {
       
        $xapikey = $request->header('xapikey');

		if($xapikey == ""){
			return \Response::json(["status" => 0, "message" => "The xapikey field is required !"]);
        }


		if ($xapikey == 'veletqdkopqdxu-mdc-cwrekymtguztizzsk') {

			$str = rand();
			$randomkey = sha1($str);

            $data = array('apiKey' => $randomkey, 'role' => 'User');

            $data = new APIKey;
            $data->apikey = $randomkey;
            $data->save();

            $result = APIKey::select('apikey')
                    ->where('id', $data->id)
                    ->first();


			if ($result != "") {
				return \Response::json(["status" => 1, "data" => $result, "message" => "Key Generated Successfully"]);
			} else {
				return \Response::json(["status" => 0, "message" => "Something Wrong"]);
            }

		} else {
            return \Response::json(["status" => 0, "message" => "Invalid xapikey"]);
        }

        } catch (\Exception $e) {
            return \Response::json(["status" => 0, "message" =>$e->getMessage() ]);
        }


    }

    public function login(Request $request){
        try{

            
            $validator = \Validator::make($request->all(), [
                'login_type' => 'required',
                'device_token' => 'required',
                'email' => 'required',
                'password' => 'required',
               
            ]);

            if($validator->fails()){
                return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
            }

            $login_type = $request->input('login_type');
            $device_token = $request->input('device_token');
            $device_type = $request->header('devicetype');
            $key = $request->header('apikey');
            $user_role = $request->header('userrole');
    
            if ($login_type == 'Manual')  { 
                $credentials = array(
                    'email' => $request->input('email'),
                    'password' => $request->input('password'), 
                    //'status'  => 'active'
                );
                
                
                    
                if (\Auth::attempt($credentials)) {
                
                    $user = Auth::user();
                    
                    if($user->status == 'inactive'){
                        return \Response::json(["status" => 0,  "message" => "Your Account is Inactive,Please Contact Administrator Active It!"]);
                    }
                    
                    if($user->email !== NULL){

                        $user_id = $request->user()->id;
                        
                        $deleteRecord = AccessToken::where('device_token', $device_token)->delete();
                        
                        $accesskey = $this->generateAccesstoken($key, $user->id, $request->device_token, $device_type, $user_role);
                        $request->user()->access_token = $accesskey->access_token;
                        
                        $userData = array(
                            'id' => $user->id,
                            'fullname' => $user->fullname,
                            'email' => $user->email,
                            'country_code' => $user->country_code,
                            'phone_number' =>$user->phone_number,
                            'city' => $user->city,
                            'state' => $user->state,
                            'address' => $user->address,
                            'login_type' => $user->login_type,
                            'access_token' => $user->access_token,
                        );

                        return \Response::json(["status" => 1, "data" => array('user' => $userData), "message" => "Login Successfully"]);
                    
                    }else{
                        return \Response::json(["status" => 0, "message" => "Please Verify Email !"]);
                    
                    }
                    
                
                }else{
                    // return \Response::json(["status" => 0, "message" => "Invalid Email or Password !"]);
                    return \Response::json(["status" => 0, "message" => "Your Email Or Password Does Not Exist!"]);
                }
            }
                
        } catch (\Exception $e) {
            return \Response::json(["status" => 0, "message" =>$e->getMessage() ]);
        }
    }

    public function generateAccessToken($key, $userID, $device_token, $device_type, $user_role)
	{
        try {
           
            $str = rand();
            $randomkey = sha1($str);

            $auth =  APIKey::where('apikey', $key)->first();

            $tokenData = new AccessToken;
            $tokenData->user_id = $userID;
            $tokenData->access_token = $randomkey;
            $tokenData->device_type = $device_type;
            $tokenData->apikey_id = $auth->id;
            $tokenData->device_token = $device_token;
            $tokenData->user_role = $user_role;
            $tokenData->save();

            if (isset($tokenData->id) && $tokenData->id)
            {
                $accesskey = AccessToken::where('id', $tokenData->id)->first();
                return $accesskey;
            }

        }catch (\Exception $e) {
            return \Response::json(["status" => 0, "message" =>$e->getMessage() ]);
        }

    }

    public function check_social_id($social_id, $login_type)
    {
       
        $result = User::select('*')->where('social_id', $social_id)->where('login_type', $login_type)->first();
        return $result;
    }

    public function socialLogin(Request $request){
        try{

            $validator = \Validator::make($request->all(), [
                'login_type' => 'required',
                'device_token' => 'required',
                'social_id' => 'required',
            ]);

            if($validator->fails()){
                return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
            }

            $login_type = $request->input('login_type');
            $device_token = $request->input('device_token');
            $device_type = $request->header('devicetype');
            $key = $request->header('apikey');
            $user_role = $request->header('userrole');
            
            
            if ($login_type == 'Gmail' || $login_type == 'WeChat' || $login_type == 'Facebook' || $login_type == 'Google' || $login_type == 'Apple') {
        
                $social_id = $request->input('social_id');

                $result = $this->check_social_id($social_id, $login_type);
               

                if ($result != "" && $result != 'null')
                {
                    $user_id = $result->id;
                    
                    $deleteRecord = AccessToken::where('device_token', $device_token)->delete();
                    $user = User::where('id', $user_id)->first();
	 

 	   if($user->status == 'inactive'){
                        return \Response::json(["status" => 401,  "message" => "Your Account is Inactive,Please Contact Administrator Active It!"]);
                    }

                    $accesskey = $this->generateAccesstoken($key, $user->id, $request->device_token, $device_type, $user_role);
                    $user->access_token = $accesskey->access_token;
                    
                    $userData = array(
                        'id' => $user->id,
                        'fullname' => $user->fullname,
                        'email' => $user->email,
                        'country_code' => $user->country_code,
                        'phone_number' =>$user->phone_number,
                        'city' => $user->city,
                        'state' => $user->state,
                        'address' => $user->address,
                        'login_type' => $user->login_type,
                        'access_token' => $user->access_token,
                    );
    
                
                    return response()->json(["status" => 1, "data" => array('user' => $userData), "message" => "Login Successfully"]);
                }
                else
                {
                    return response()->json(["status" => 0, "message" => "User not Found"]);
                }


           }


        } catch (\Exception $e) {
            return \Response::json(["status" => 0, "message" =>$e->getMessage() ]);
        }

    }

    public function signUp(Request $request){

        $user_role = $request->header('userrole');
        $apikey = $request->header('apikey');
        $device_type = $request->header('devicetype');
        $login_type = $request->input('login_type');

        if($request->input('login_type') == ""){
             return \Response::json([ "status" => 0,  "message" => 'Please Enter Your Login Type  !']);
        }

        $social_data = User::where('social_id' , $request->input('social_id'))->first();

        if($request->input('login_type') == 'Manual'){

            $rules = [
           'login_type' => 'required',
           'fullname' => 'required',
           'email' => 'required|unique:users|email|max:200',
           'phone_number' =>  'required|min:8|max:15',
        //   'password' =>'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',      
        //   'password_confirmation' => 'required|min:6|required_with:password|same:password',
           'password' =>'required|min:6',      
           'password_confirmation' => 'required|min:6',
        
           ];

           $messages = [
               'login_type.required' => 'Please Enter Your Login Type !',
               'phone_number.required'=> 'Please Enter Your Phone Number !',
           
               'email.required' => 'Please Enter Email!',
               'password.required' => 'What\'s your password',
               'password.regex' => 'Secured password must be contain lower letter, upper latter, digit and Special character.',
               'password_confirmation.required' => 'What\'s your confirm password',
               'fullname.required'=> 'Please Enter Full Name !',
               'password_confirmation.same' => 'Your password & confirm passowrd must be same !',
           ];

       }else{
            $rules = [
               'social_id' => 'required',
               'email' => 'required|unique:users|email|max:200',
               'phone_number' =>  'min:8|max:15',
           ];

           $messages = [
               'social_id.required' => 'Please Enter Social Id !',
           ];

       }


       $validation = \Validator::make(request()->all() , $rules , $messages);

       if ($validation->fails()) {
           return \Response::json([ "status" => 0,  "message" => $validation->errors()->first()]);
       }
       
       $exists = User::where('phone_number', $request->input('phone_number'))->exists();
        if ($exists) {

           return \Response::json([ "status" => 0,  "message" => 'The phone number has already been taken']);
         }
       
            $user = new User;
           
            if ($login_type == 'Gmail' || $login_type == 'WeChat' || $login_type == 'Facebook' || $login_type == 'Google' || $login_type == 'Apple' ) {

                $user->fullname = $request->input('fullname') ? $request->input('fullname') : '';
                $user->email = $request->input('email') ? $request->input('email') : '';
                $user->password = $request->input('password') ? Hash::make($request->input('password')) : '';
                $user->phone_number = $request->input('phone_number') ? $request->input('phone_number') : '';
                $user->country_code = $request->input('country_code') ? $request->input('country_code') : '';
                $user->profile_image = '';
                $user->country = $request->input('country') ? $request->input('country') : '';
                $user->login_type = $request->input('login_type');
                $user->social_id = $request->input('social_id');
                $user->address = $request->input('address') ? $request->input('address') : '';
                $user->address2 = $request->input('address2') ? $request->input('address2') : '';
                $user->city = $request->input('city') ? $request->input('city') : '';
                $user->state = $request->input('state') ? $request->input('state') : '';
                $user->save();


            }else{

                $user->fullname = $request->input('fullname');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->phone_number = $request->input('phone_number');
                $user->country_code = '';
                $user->country = $request->input('country') ? $request->input('country') : '';
                $user->state = $request->input('state') ? $request->input('state') : '';
                $user->address = $request->input('address') ? $request->input('address') : '';
                $user->address2 = $request->input('address2') ? $request->input('address2') : '';
                $user->city = $request->input('city') ? $request->input('city') : '';
                $user->login_type = $request->input('login_type');
                $user->profile_image = '';
                $user->social_id = '';
                $user->save();
            }

            if($user->email){
                $this->dispatch(new \App\Jobs\NewUserRegisterJob($user));
            }
            
            if (isset($user->id) && $user->id)
            {

                $accesskey = $this->generateAccesstoken($apikey, $user->id, $request->device_token, $device_type, $user_role);
                
                $user->access_token = $accesskey->access_token;

                $user_data = array(

                "id"=> $user->id,
                "fullname"=> $user->fullname ? $user->fullname : '',
                "email"=> $user->email ? $user->email : '',
                "access_token"=> $user->access_token ? $user->access_token : '',
                "profile_image"=> $user->profile_image ?  $user->profile_image : '',
               
                );

                //New user registration successfully
                return \Response::json(["status" => 1, "data" => array('user' => $user_data), "message" => "User Registration Successfully"]);




            }else{
                return \Response::json(["status" => 0, "message" => "Something Want Wrong ! Please try again"]);
            }



    }


    public function logout(Request $request)
    {

        $user_id = request()->header('userid');
        $accesstoken = request()->header('accesstoken');
        
        $data = AccessToken::where('user_id',$user_id)
                            ->where('access_token',$accesstoken)
                            ->delete();

        return \Response::json(["status" => 1, "message" => "User Logout Successfully"]);

    }

    public function getUserByEmail($email)
    {
        $userdata = User::where('email',$email)
                    ->where('status','active')
                    ->first();
      
        return $userdata;
    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required',
        ]);

        if (!empty($validator->fails()))
        {
            return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
        }

        $to = $request->email;
        $user = $this->getUserByEmail($to);
        $from = env('MAIL_USERNAME');
        
        if(isset($user))
        {
            Mail::send('email_temp.forgetPassword', ['user' => $user] , function ($message) use ($from,$to) {
                $message->from($from, 'MDC');
                $message->to($to)->subject('Reset Password');
            });

            return response()->json(["status" => 1, "message" => "User Reset Password Link Send Successfully"]);
        }
        else
        {
            return response()->json(["status" => 0, "message" => "Your Email Does Not Exist!"]);
        }
    }

    public function forgetview($email,$userID)
    {
      
        return view('user.forgetpassword',compact('email','userID'));
    }

    public function changePassword(Request $request)
    {
       
        $email = $request->email;
        $password = Hash::make($request->password);
        $userID = $request->userID;
 
        $user = User::where('email',$email)
                     ->where('id',$userID)
                     ->update(['password'=>$password]);
    }




}
