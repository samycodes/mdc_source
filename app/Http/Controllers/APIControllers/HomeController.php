<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\Hospital;
use App\Objects\HospitalImages;
use App\Objects\Offers;
use App\Objects\Suppliers;
use App\Objects\Services;
use App\Objects\Banner;

class HomeController extends Controller
{

      public function notificationTesting(Request $request){
            $validator = \Validator::make($request->all(),[
                'device_token' => 'required',
                
            ]);

            if ($validator->fails()) {
               return response()->json(array('error' => $validator->errors()->first()));
            }
            
            $data = array('mtitle' =>'Android IOS Notification','mdesc' =>'Notification Testing !' );
               
            $device_token = $request->input('device_token');
            $this->pushNotificationTesting($data, $device_token);
      
            
    }

public function pushNotificationTesting($data, $decive_token)
        {
        
        $reg_id = $decive_token;
        $fcmMsg = array(
        'body' => $data['mdesc'],
        'title' => $data['mtitle'],
        'sound' => "default",
       // 'color' => "#203E78",
        );
        
        $fcmFields = array(
        'to' => $reg_id,
        'priority' => 'high',
        'notification' => $fcmMsg,
        'data' => $fcmMsg
        );
        
       
        $headers = array
        (
	'Authorization: key=AAAAAuJ8B_s:APA91bHsl_Si5kXGNk5oszoph2SX5xYaoWs3dyqguwqKo4o-p_qCOJFe1Zcavxwzww8wAQ10dC5ehx56NuEp3qi0nXjMvNobwI0nCZAG7VuQlNJ1uo3YCGQtFQfnGsFfuSn34MFKB-3y',      
	  'Content-Type: application/json',
        // 'sandbox:true',
        );
         
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
        $result = curl_exec($ch);
        curl_close($ch);
        print_r($result);
        exit;
        
        return $result . "\n\n";

        }


    public function home(Request $request){

        $offers = Banner::select('id','image','hospital_id')->orderBy('id','desc')->where('status','active')->take(4)->get();
        $latestOffer = Offers::select('id','title','description','image', 'hospital_id','status')->where('status','active')->orderBy('id','desc')->get();
        $recent = Hospital::select('id as hospital_id','name','logo as image','status')->where('status','active')->orderBy('id','desc')->get();

        $data = array('offers' => $offers , 'latestOffers' => $latestOffer , 'suppliers' => $recent);

        if(isset($offers) || isset($latestOffer) || isset($suppliers))
        {
          return response()->json(["status" => 1, "data" => $data ,"message" => "Data get successfully."]);
        }
        else
        {
           return response()->json(["status" => 0, "message" => "Data not found."]);
        }
    }

    public function offerListing(){
        $data = Offers::select('hospital_id')->get();
        $offers = Hospital::select('id','name','description','city','logo')->whereIn('id', $data)->where('offerable',1)->where('status','active')->get();

        if(count($offers) > 0)
        {
          return response()->json(["status" => 1, "data" => $offers ,"message" => "Data get successfully."]);
        }
        else
        {
          return response()->json(["status" => 0, "message" => "Data not found."]);
        }

    }
    
    public function offerSearch(Request $request){
        
        
         if($request->input('city_name')){
              $input = explode (",", $request->input('city_name'));
          }else{
              $input = 0;
          }
         
             
            if($input != 0){
                
                $offers = Hospital::select('id','name','description','city','logo')
                            ->whereIn('city', $input)
                            ->where('offerable',1)
                            ->where('status','active')
                            ->get();
                            
            }else{
                 $offers = Hospital::select('id','name','description','city','logo')->where('offerable',1)->where('status','active')->get();
            }  
            
                if(count($offers) > 0)
                {
                  return response()->json(["status" => 1, "data" => $offers ,"message" => "Data get successfully."]);
                }
                else
                {
                  return response()->json(["status" => 0, "message" => "Data not found."]);
                }
        
    }
    
    public function directoryListing(){
        $offers = Hospital::select('id','name','description','city','logo')->where('status','active')->get();

        if(count($offers) > 0)
        {
          return response()->json(["status" => 1, "data" => $offers ,"message" => "Data get successfully."]);
        }
        else
        {
          return response()->json(["status" => 0, "message" => "Data not found."]);
        }
    }
    
    public function directorySearch(Request $request){
        
              if($request->input('city_name')){
                    $input = explode (",", $request->input('city_name'));
              }else{
                  $input = 0;
              }
         
             
            if($input != 0){
                
                $offers = Hospital::select('id','name','description','city','logo')
                            ->whereIn('city', $input)
                            ->where('status','active')
                            ->get();
               
            }else{
                 $offers = Hospital::select('id','name','description','city','logo')->where('status','active')->get();
            }  
            
                if(count($offers) > 0)
                {
                  return response()->json(["status" => 1, "data" => $offers ,"message" => "Data get successfully."]);
                }
                else
                {
                  return response()->json(["status" => 0, "message" => "Data not found."]);
                }
    }
    
    public function offerDetail(Request $request){
        
        $validator = \Validator::make($request->all(), [
                'hospital_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
        }
            
        $id = $request->input('hospital_id');
        
        $offer = Hospital::where('id', $id)->where('offerable',1)->where('status','active')->first();
        $images = HospitalImages::select('id','image')->where('hospital_id', $offer->id)->get();
        
        $services = Services::select('id','name','price_before_discount','price_after_discount')->where('hospital_id', $offer->id)->get();
        
        
       
        $data = array(
            'id' => $offer->id,
            'name' => $offer->name,
            'description' => $offer->description,
            'logo' => $offer->logo,
            'full_time' => $offer->full_time,
            'start_day' =>  $offer->start_day,
            'end_day' =>  $offer->end_day,
            'closed_day' => $offer->closed_day,
            'start_time' =>  date("g:i a", strtotime($offer->start_time)),
            'end_time' => date("g:i a", strtotime($offer->end_time)),
            'phone_number_countrycode' => $offer->country_code,
            'phone_number' =>   $offer->phone_number,
            'mobile_number_countrycode' => $offer->country_code2,
            'mobile_number' =>  $offer->mobile_number,
            'facebook_link' =>  $offer->facebook_link,
            'instagram_link' =>  $offer->instagram_link,
            'twitter_link' =>  $offer->twitter_link,
            'dribble_link' =>  $offer->dribble_link,
            'address_lattitude' =>  $offer->address_latitude,
            'address_longitude' =>   $offer->address_longitude,
            'address' => $offer->street .' - '. $offer->apartment .' - '. $offer->city .' - '. $offer->state .' - '. $offer->country,
            'slider_images' => $images,
            'services' => $services,
            
        );
        
        if(count($data) > 0)
        {
          return response()->json(["status" => 1, "data" => $data ,"message" => "Data get successfully."]);
        }
        else
        {
          return response()->json(["status" => 0, "message" => "Data not found."]);
        }
        
    }
    
    public function directoryDetail(Request $request){
        $validator = \Validator::make($request->all(), [
                'hospital_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
        }
            
        $id = $request->input('hospital_id');
        
        $offer = Hospital::where('id', $id)->where('status','active')->first();
        $images = HospitalImages::select('id','image')->where('hospital_id', $offer->id)->get();
        
        $services = Services::select('id','name','price_before_discount','price_after_discount')->where('hospital_id', $offer->id)->get();
        
        
       
        $data = array(
            'id' => $offer->id,
            'name' => $offer->name,
            'description' => $offer->description,
            'logo' => $offer->logo,
            'start_day' =>  $offer->start_day,
            'end_day' =>  $offer->end_day,
            'closed_day' => $offer->closed_day,
            'full_time' => $offer->full_time,
            'start_time' =>  date("g:i a", strtotime($offer->start_time)),
            'end_time' => date("g:i a", strtotime($offer->end_time)),
            'phone_number_countrycode' => $offer->country_code,
            'phone_number' =>   $offer->phone_number,
            'mobile_number_countrycode' => $offer->country_code2,
            'mobile_number' =>  $offer->mobile_number,
            'facebook_link' =>  $offer->facebook_link,
            'instagram_link' =>  $offer->instagram_link,
            'twitter_link' =>  $offer->twitter_link,
            'dribble_link' =>  $offer->dribble_link,
            'address_lattitude' =>  $offer->address_latitude,
            'address_longitude' =>   $offer->address_longitude,
           'address' => $offer->street .' - '. $offer->apartment .' - '. $offer->city .' - '. $offer->state .' - '. $offer->country,
            'slider_images' => $images,
            'services' => $services,
            
        );
        
        if(count($data) > 0)
        {
          return response()->json(["status" => 1, "data" => $data ,"message" => "Data get successfully."]);
        }
        else
        {
          return response()->json(["status" => 0, "message" => "Data not found."]);
        }
        
    }
    
    public function offerServicePrice(Request $request){
        $validator = \Validator::make($request->all(), [
                'hospital_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
        }
            
        $id = $request->input('hospital_id');
        
        $offer = Hospital::where('id', $id)->where('status','active')->first();
        $data = Services::select('id','name','price_before_discount','price_after_discount')->where('hospital_id', $offer->id)->get();
        
        if(count($data) > 0)
        {
          return response()->json(["status" => 1, "data" => $data ,"message" => "Data get successfully."]);
        }
        else
        {
          return response()->json(["status" => 0, "message" => "Data not found."]);
        }
       
       
    }
}
