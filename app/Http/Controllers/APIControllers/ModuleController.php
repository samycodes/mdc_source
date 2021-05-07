<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\ContactUs;
use App\Objects\Notification;
use App\Objects\CardType;
use App\Objects\DocumentType;
use App\Objects\Policy;
use App\Objects\Condition;
use App\Objects\Hospital;
use App\User;


class ModuleController extends Controller
{
    
 public function citiesListing(){
        $hospital = Hospital::select('city')
                     ->distinct()
                     ->get();
                     
        $array = array();
        $i = 0;
        foreach($hospital as $data){
            $i++;
            $d['id'] = $i;
            $d['name'] = ucfirst($data['city']);
            array_push($array, $d);
           
        } 
        
        $data = array("cityList" => $array);
      
          if(isset($array))
          {
            return response()->json(["status" => 1, "data" => $data ,"message" => "Data get successfully."]);
          }
          else
          {
             return response()->json(["status" => 0, "message" => "Data not found."]);
          }
      
        
    }

    public function cardType(){
        
        $data = CardType::select('id','name','price','status')->where('status','active')->orderBy('created_at','asc')->get();
        
        if($data->count() > 0)
        {
          return response()->json(["status" => 1, "data" => $data ,"message" => "Data get successfully."]);
        }
        else
        {
           return response()->json(["status" => 0, "message" => "Data not found."]);
        }
    }
    
    public function documentType(){
        $data = DocumentType::select('id','name','status')->where('status','active')->orderBy('created_at','asc')->get();
        
        if($data->count() > 0)
        {
          return response()->json(["status" => 1, "data" => $data ,"message" => "Data get successfully."]);
        }
        else
        {
           return response()->json(["status" => 0, "message" => "Data not found."]);
        }
    }
    
    public function getinTouch(Request $request){
        
       $validator = \Validator::make(request()->all(), [
              
              'name' => 'required|max:20',
              'email' => 'required|email|max:70',
              'type' => 'required|in:Complains,GeneralInquiry',
              'message' => 'required|max:120',
              
      ]);

      if (!empty($validator->fails())){
          return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
      }
      
      $id = request()->header('userid');
      $user = User::where('id',$id)->first();
      
      $data = new ContactUs();
      $data->name = $request->input('name');
      $data->email = $request->input('email');
      $data->message = $request->input('message');
      $data->type = $request->input('type');
      $data->user_id = $user->id;
      $data->save();
      
      if(isset($data))
      {
        return response()->json(["status" => 1, "message" => "Email Sent Successfully"]);
      }
      else
      {
         return response()->json(["status" => 0, "message" => "Data not found"]);
      }
      
    
      
    }
    
    
    
    public function notificationListing(Request $request){
            $id = request()->header('userid');
            $user = User::where('id',$id)->first();
           
            $notification = Notification::orderBy('id','desc')
                                        ->select('id','title','message','notification_type','read_status')
                                        ->where('receiver_id', $user->id)
                                        ->get();
        
            if(count($notification) > 0)
            {
              return response()->json(["status" => 1, "data" => $notification ,"message" => "Data get successfully."]);
            }
            else
            {
              return response()->json(["status" => 0, "message" => "Data not found."]);
            }
        
                    
    }

    public function aboutusview(){
     	 $aboutus =  \DB::table('about_us')->first();
                   return view('email_temp.aboutus', compact('aboutus'));
    }
    
    public function aboutUs(){
        
        $link = env('APP_URL').'/api/about';
        
      
       if($link){
            return \Response::json(["status" => 1, "data" => $link , "message" => "Successfully"]);
       }else{
            return \Response::json(["status" => 0,  "message" => "Something want wrong ! Please try again."]);
       }
       
    }
    
    
   public function terms()
   {
       $data = Condition::first();
       return view('email_temp.term', compact('data'));
   }
   
   public function termsServices(){
       
       $link = env('APP_URL').'/api/terms/services';
        
      
       if($link){
            return \Response::json(["status" => 1, "data" => $link , "message" => "Successfully"]);
       }else{
            return \Response::json(["status" => 0,  "message" => "Something want wrong ! Please try again."]);
       }
       
   }
   
   
   public function policy()
   {
       $data = Policy::first();
        return view('email_temp.policy', compact('data'));
   }
   
   public function privacyPolicy(){
       
       $link = env('APP_URL').'/api/policy';
        
      
       if($link){
            return \Response::json(["status" => 1, "data" => $link , "message" => "Successfully"]);
       }else{
            return \Response::json(["status" => 0,  "message" => "Something want wrong ! Please try again."]);
       }
       
   }
   
}
