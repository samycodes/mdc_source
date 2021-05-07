<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\Hospital;
use App\Objects\HospitalImages;
use App\Objects\Offers;
use App\Objects\Suppliers;
use App\Objects\Services;

class HomeController extends Controller
{
    public function home(Request $request){

          $offers = Offers::select('id','title','description','image','status')->where('status','active')->orderBy('created_at','asc')->take(4)->get();
        $latestOffer = Offers::select('id','title','description','image','status')->orderBy('created_at','asc')->get();
        $suppliers = Suppliers::select('id','name','email','image','status')->orderBy('created_at','asc')->get();

        $data = array('offers' => $offers , 'latestOffers' => $latestOffer , 'suppliers' => $suppliers);


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
        
        $offers = Hospital::select('id','name','description','city','logo')->where('offerable',1)->where('status','active')->get();

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
