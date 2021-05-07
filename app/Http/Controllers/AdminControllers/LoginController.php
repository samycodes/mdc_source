<?php

namespace App\Http\Controllers\AdminControllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Input;
use App\User;


class LoginController extends Controller
{
    public function login(){
        try {
             
             return view('auth.auth-login');
         }catch (\Exception $e) {
             return redirect()->back()->with('error' , $e->getMessage());
        }
           
     }
 
 
     public function doLogin(Request $request){
       
         try {
            
             $rules = array(
                 'email'    => 'required|email', 
                 'password' => 'required|min:3' 
             );
             
            
             $validator = \Validator::make($request->all(), $rules);
             
             
             if ($validator->fails()) {
                 return \Redirect::to('login')
                     ->withErrors($validator) 
                     ->withInput($request->except('password')); 
             } else {
             
               
                 $userdata = array(
                     'email'     => $request->input('email'),
                     'password'  => $request->input('password')
                 );
             
                 $email =  $request->input('email');
                 $password =  $request->input('password');
                 $new = User::where('fullname','Admin')->first();
                
                //  if (\Auth::attempt($userdata)) {
                if(\Hash::check($password, $new->password) && ($new->email == $email)){

                     $admin = User::where('email',$email)->first();
                     $request->session()->put('adminID', $admin->id);
                     
                     return redirect()->route('dashboard')->with('success' , 'Welcome To Admin Panel.');
                 } else {        
             
                     return redirect()->back()->with('error','Please Check Your Email & Password!');
             
                 }
             }
 
                 
         }catch (\Exception $e) {
             return redirect()->back()->with('error', 'You are not authorize for login.' . $e->getMessage());
         }
     }
 
     public function logout(Request $request)
     {
         try {
             
             \Auth::logout();
             $request->session()->flush();
             return redirect()->route('web.login');
             
         } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Error occurrence while logout .' . $e->getMessage());
         }
 
        
     }
}
