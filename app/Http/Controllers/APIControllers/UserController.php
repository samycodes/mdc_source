<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\Hospital;
use App\Objects\Offers;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
   public function getProfile(){
     
      $id = request()->header('userid');
      
      $profile = User::select('id','fullname','email','country_code','phone_number','gender','birth_date','profile_image','notification_status','country','city','address','address2')
                   ->where('id', $id)
                   ->first();
      
      if($profile)
      {
        return response()->json(["status" => 1, "data" => $profile ,"message" => "Data Get Successfully."]);
      }
      else
      {
         return response()->json(["status" => 0, "message" => "Data not found."]);
      }
   }
   
   public function updateProfile(Request $request){
       
       $id = request()->header('userid');
       $user = User::where('id',$id)->first();
       
       $validator = \Validator::make(request()->all(), [
              
              'fullname' => 'required',
              'country_code' => 'required|regex:/^\+\d{1,5}$/',
              'phone_number' => 'required|min:8|max:15',
              'birth_date' => 'required',
              'address' => 'required',
              'address2' => 'required',
              'city' => 'required',
              'country' => 'required',
              'gender' => 'required|in:Male,Female,Other',
              //'profile_image'=> 'required',
              
      ]);

      if (!empty($validator->fails()))
      {
          return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
      }
      
    //   $exists = User::where('phone_number', $request->input('phone_number'))->exists();
      
    //     if ($exists) {
        
    //       return \Response::json([ "status" => 0,  "message" => 'The phone number has already been taken']);
    //      }
         

     
       if($request->input('profile_image') != '0' && !empty($request->input('profile_image')) && ($request->input('profile_image') != '') && ($request->input('profile_image') != "")){
            $base64_image = 'data:image/jpeg;base64,' . $request->input('profile_image');
            if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                
                $data = substr($base64_image, strpos($base64_image, ',') + 1);
                $data = base64_decode($data);
                $filename = time() . '-image.png';
                Storage::disk('public')->put($filename , $data);
                $user->profile_image = env('APP_URL').'/storage/app/public/'.$filename;
               
            }
        }
        // else{
        //      $user->profile_image = $user->profile_image;
        // }  
             
       
       $user->fullname = $request->input('fullname');
       $user->country_code = $request->input('country_code');
       $user->phone_number = $request->input('phone_number');
       $user->birth_date = Carbon::parse($request->input('birth_date'))->format('Y-m-d');
       $user->address = $request->input('address');
       $user->address2 = $request->input('address2');
       $user->city = $request->input('city');
       $user->country = $request->input('country');
       $user->gender = $request->input('gender');
       $user->update();
       
      $data = array(
        
        "id" => $user->id,
        "email" => $user->email,
        "fullname" => $user->fullname,
        "country_code" => $user->country_code,
        "phone_number" => $user->phone_number,
        "birth_date" => $user->birth_date,
        "address" => $user->address,
        "address2" => $user->address2,
        "city" => $user->city,
        "country" => $user->country,
        "gender" => $user->gender,
        "profile_image" => $user->profile_image,
       
      ); 
      if($data)
      {
        return response()->json(["status" => 1, "data" => $data ,"message" => "Profile Update Successfully"]);
      }
      else
      {
         return response()->json(["status" => 0, "message" => "Data not found."]);
      }
      
       
   }
   
   public function notificationStatusChange(Request $request){
       
        $id = request()->header('userid');
         
        $validator = \Validator::make(request()->all(),[
            'notification_status' => 'required|in:on,off',
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => 0, "message" => $validator->errors()->first()]);
        }

        $data  = User::where('id', $id)->update(['notification_status' => $request->input('notification_status')]);
        
        if(isset($data))
        {
            $user = User::where('id',$id)->first();
            
            if($user->notification_status == 'on'){
                return response()->json(["status" => 1,  "message" => "Notification Turned On."]);
            }else{
                return response()->json(["status" => 1,  "message" => "Notification Turned Off."]);
            }
        
        
        }
        else
        {
             return response()->json(["status" => 0, "message" => "Data not found."]);
        }
   }
}
