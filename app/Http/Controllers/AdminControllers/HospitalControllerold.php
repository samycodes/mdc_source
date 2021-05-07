<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\Hospital;
use App\Objects\Services;
use App\Objects\Offers;
use App\Objects\HospitalImages;
use App\Objects\APIKey;
use App\Objects\AccessToken;
use Validator;

class HospitalController extends Controller
{
     public function pushNotification($data, $decive_token)
    {
    

    $reg_id =$decive_token; 
    $fcmMsg = array(
    'body' => $data['mdesc'],
    'title' => $data['mtitle'],
    'sound' => "default",
    'color' => "#203E78",
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
    'Content-Type: application/json'
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
   
    // return $result . "\n\n";
    return $result;

    }
    
    public function uploadCropImage(Request $request)
    {
       
        $image = $request->image;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path = public_path('upload/'.$image_name);

        file_put_contents($path, $image);
        return response()->json(['status'=>true]);
    }
    
    public function index(){
        $hospitals = Hospital::orderBy('id','desc')->get();
        
        if(isset($hospitals)){
            return view('backend.hospitals.index', compact('hospitals'));
        }else{
            return redirect()->back()->with('error', 'Data Not Found !');
        }
        
    }
    
    public function serviceListing($hospitalid){
        $services = Services::where('hospital_id',$hospitalid)->get();
        if(isset($services)){
            return view('backend.hospitals.services.index', compact('services'));
        }else{
            return redirect()->back()->with('error', 'Data Not Found !');
        }
        
    }

    public function view($id){
        $hospital = Hospital::where('id', $id)->first();
        $images = HospitalImages::where('hospital_id', $hospital->id)->get();
        $services = Services::where('hospital_id', $hospital->id)->get();
        if(isset($hospital)){
            return view('backend.hospitals.view', compact('hospital','images','services'));
        }else{
            return redirect()->back()->with('error', 'Data Not Found !');
        }
    }

    public function add(){
        return view('backend.hospitals.add');
    }

    public function save(Request $request){
   
 	

            $validator = \Validator::make($request->all(),[
                
                'name' => 'required',
                'description' => 'required|max:200',
                'country_code' => 'required|not_in:0|regex:/^\+\d{1,6}$/',
                'phone_number' => 'required|min:8|max:10',
                'latlongaddress' => 'required',
                'lat' => 'required',
                'lon' => 'required',
                'street' => 'required',
                'apartment' => 'required',
                'state' => 'required',
                'city'  => 'required',
                'country'  => 'required',
                'working_day' => 'required',
                'start_time' => 'required',
                'end_time' => 'required|after:start_time',
                'country_code2'=> 'required|not_in:0|regex:/^\+\d{1,6}$/',
                'mobile_number'=> 'required|min:8',
               'facebook' => 'sometimes|nullable|url',
                'instagram' => 'sometimes|nullable|url',
                'twitter' => 'sometimes|nullable|url',
                'website' => 'sometimes|nullable|url',
               //'logo_image'=> 'required|dimensions: min_width=10, min_height=10,max_width=200, max_height=200|max:1000', 

                'imgdata' => 'required', 
               'multipleimages' => 'required', 
               'multipleimages.*' => 'max:1000', 
               'multipleimages.*' => 'dimensions: min_width=10, min_height=10,max_width=600, max_height=600',
	 

                'sname.*' => 'required',
                'sprice1.*' => 'required',
                'sprice2.*' => 'required',
                
            ],
              [
	                  
                 'imgdata.required' => 'Logo Image Field Is Required',
                'country_code.regex' =>  'Phone Number Country Code Is Not Valid',
                'country_code2.regex' =>  'Mobile Number Country Code Is Not Valid',
                'country_code.not_in' =>  'Phone Number Country Code Zero Not Accepted! Please Add Greater Than Zero',
                'country_code2.not_in' =>  'Mobile Number Country Code Zero Not Accepted! Please Add Greater Than Zero',

                'logo_image.dimensions' => 'Please upload logo image dimension (200 * 200) pixel logo image !',
                'logo_image.max' => "Maximum logo size to upload is (1000 KB). If you are uploading a photo, try to reduce its resolution to make it under 1000 KB",
	            'logo_image.size' => "Maximum logo size to upload is (1000 KB). If you are uploading a photo, try to reduce its resolution to make it under 1000 KB",
                        
                'sname.*.required'=> 'Service Name Field Is Required', 
                'sprice1.*.required'=> 'Service Before Discount Price Field Is Required', 
                'sprice1.*.not_in' => 'Service Price Zero Not Accepted! Please Add Greater Than Zero',
                'sprice2.*.not_in' => 'Service Price Zero Not Accepted! Please Add Greater Than Zero',
                'sprice2.*.required'=> 'Service After Discount Price Field Is Required', 
                
                'latlongaddress.required'=> 'Full Address Field Is Required', 
                'name.required'=> 'Hospital Name Field Is Required', 
                'country_code.required'=> 'Country Code Field Is Required',
                'country_code2.required'=> 'Mobile No Country Code Field Is Required',
                'phone_number.required'=> 'Phone Number Field Is Required', 
                'mobile_number.required'=> 'Mobile No Field Is Required',
                'lat.required'=> 'Address Latitude Field Is Required',
                'lon.required'=> 'Address Longitude Field Is Required',
                'working_day.required'=> 'Working Days Field Is Required', 
                'start_time.required'=> 'Starting Time Field Is Required', 
                'end_time.required'=> 'Ending Time Field Is Required', 

                'multipleimages.*.max' => "Maximum multiple image size to upload is (1000 KB). If you are uploading a photo, try to reduce its resolution to make it under 1000 KB",
                'multipleimages.*.dimensions' => "Maximum multiple image dimensions to upload is (600 * 600)",
                'multipleimages.required' => 'Multiple Image Field Is Required',
               
               
             ]);

           
            
            
            if ($validator->fails()) {
                    return response()->json(array('error' => $validator->errors()->first()));
            }
         
	
            #hospital module 

           \DB::beginTransaction();
           try {
           
            $hospital = new Hospital();
            
            
            if($request->input('imgdata') != ''){
                $base64_image = $request->input('imgdata');
                if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                    $data = substr($base64_image, strpos($base64_image, ',') + 1);
                    $data = base64_decode($data);
                    $filename = time() . '-image.png';
                    \Storage::disk('public')->put($filename , $data);
                    $hospital->logo  = env('APP_URL').'/storage/app/public/'.$filename;
                }
            }  
            
                     
            $hospital->name = $request->input('name');
            $hospital->description =  $request->input('description') ? $request->input('description') : '';
            $hospital->country_code = $request->input('country_code');
            $hospital->phone_number = $request->input('phone_number');
            $hospital->address_latitude = $request->input('lat');
            $hospital->address_longitude = $request->input('lon');
            $hospital->address = $request->input('latlongaddress') ? $request->input('latlongaddress') : '';
            $hospital->street = $request->input('street');
            $hospital->apartment = $request->input('apartment');
            if($request->input('office')){
                $hospital->office = $request->input('office');    
            }
            $hospital->city = $request->input('city');
            $hospital->state = $request->input('state');
            $hospital->country = $request->input('country') ? $request->input('country') : '';
            $data = $request->input('working_day'); 
            if($data){
                $hospital->start_day = $firstEle = $data[0];
                $hospital->end_day = $lastEle = $data[count($data) - 1];
            }else{
                $hospital->start_day = 'Mon';
                $hospital->end_day = "";
            }
            
            #closed_day_count_here
            $all_days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
            $days = array();
            foreach($all_days as $data){
                if(!in_array($data, $request->input('working_day'), TRUE)){
                    array_push($days, $data);
                }
            }
    
            $hospital->closed_day = implode(",", $days);
            $hospital->working_days = implode(",", $request->input('working_day'));
            $hospital->start_time =  date("H:i", strtotime($request->input('start_time')));
            $hospital->end_time = date("H:i", strtotime($request->input('end_time')));           
            $hospital->facebook_link = $request->input('facebook') ? $request->input('facebook') : '';
            $hospital->instagram_link = $request->input('instagram') ? $request->input('instagram') : '';
            $hospital->twitter_link = $request->input('twitter') ? $request->input('twitter') : '';
            $hospital->dribble_link = $request->input('website') ? $request->input('website') : '';
            $hospital->country_code2 = $request->input('country_code2');
            $hospital->mobile_number =  $request->input('mobile_number');
            $hospital->services = '';
            $hospital->offerable = $request->input('offerable') ? 1 : 0;
            $hospital->full_time = $request->input('hospital_time') ? "true" : "false";
            $hospital->save();
            
            
             #multiple image upload
             if($request->file('images')){
                 if(count($request->file('images')) > 4){
                    return response()->json(array('error' => 'Please upload maximum three image !'));
                 }
             }
            
            if ($request->hasFile('multipleimages')) {
                    
            
                $images = $request->file('multipleimages');  
                
                foreach($images as $image){
                    
                    $file = $image;
                    $baseurl = env('APP_URL');
                    $name = time() . $file->getClientOriginalName();
                    $file->move(public_path() . "/images/hospitals/", $name);
                    $filePath = $baseurl."/public/images/hospitals/" . $name;
                    
                    $images = new HospitalImages();
                    $images->hospital_id = $hospital->id;
                    $images->image = $filePath;
                    $images->save();
 	
                    
                }    
                
            
            }
            
            #service Module
           
          
            $post_count = count($request->input('sname')); 
            $post1 = array(); //create array
            $post2 = array();
            $post3 = array();
            $post1 = $request->input('sname');
            $post2 = $request->input('sprice1');
            $post3 = $request->input('sprice2');

            
            
            for ($i = 0; $i < $post_count; $i++) {

             if( $post2  <  $post3){
 	            return response()->json(array('error' => 'Service Price Before Discount Must Be Greater Then Service Price After Discount'));
	
             }
                
                $service = new Services;
                $service->name = $post1[$i];
                $service->price_before_discount = $post2[$i];
                $service->price_after_discount = $post3[$i];
                $service->hospital_id = $hospital->id;
                $service->save();
            
            }

            $users = \DB::table('users')->where('notification_status','on')->pluck('id');
           
            $userToken = AccessToken::select('device_token')->whereIn('user_id', $users)->where('device_token', '!=', null)->get();
           
         
            $data = array('mtitle' =>'New Notification','mdesc' => 'New Hospital  ' . $hospital->name . '  & Hospital Service Added.' );
            
            foreach($userToken as $token){
                 
                
                $device_token = $token['device_token'];
                //$this->pushNotification($data, $device_token);
      
            }
            

        
            \DB::commit();
            return response()->json(['success'=>'New hospital Added Successfully.']);

        } catch (\Exception $exception) {
            \DB::rollback();
            return response()->json(['error'=> $exception->getMessage()]);
        } catch (\Throwable $exception) {
            \DB::rollback();
            return response()->json(['error'=> $exception->getMessage()]);
        }
           
       
    }

    public function edit($id){
        $hospital = Hospital::where('id', $id)->first();
        $images = HospitalImages::where('hospital_id', $hospital->id)->get();
        $services = Services::where('hospital_id', $hospital->id)->get();
        return view('backend.hospitals.edit',compact('hospital','images','services'));
        
       
    }
    
    public function update(Request $request, $id){
       
        $validator = \Validator::make($request->all(),[

                'name' => 'required|',
                'description' => 'max:200',
                'country_code' => 'required|not_in:0|regex:/^\+\d{1,6}$/',
                'phone_number' => 'required|min:8|max:10',
                'latlongaddress' => 'required',
                'lat' => 'required',
                'lon' => 'required',
                'street' => 'required',
                'apartment' => 'required',
                'state' => 'required',
                'city'  => 'required',
                'country'  => 'required',
                'country_code2'=> 'required|not_in:0|regex:/^\+\d{1,6}$/',
                'mobile_number'=> 'required|min:8',
                'working_day' => 'required',
                'start_time' => 'required',
                'end_time' => 'required|after:start_time',
                'facebook' => 'sometimes|nullable|url',
                'instagram' => 'sometimes|nullable|url',
                'twitter' => 'sometimes|nullable|url',
                'website' => 'sometimes|nullable|url',
                // 'logo'=> 'required',
                // 'images.*' => 'required',
                //'logo_image' =>  'max:1000|dimensions:max_width=200,max_height=200, min_width=10, min_height=10', 
                'images.*' => 'max:1000', // 1 kb size
                 'images.*' => 'dimensions: min_width=10, min_height=10,max_width=600, max_height=600',
                
            ],
              [
                
                 'logo_image.dimensions' => 'Please upload logo image dimension (200 * 200) pixel logo image !',
                'logo_image.max' => "Maximum file size to upload is (1000 KB). If you are uploading a photo, try to reduce its resolution to make it under 1000 KB",
                
                
                // 'images.dimensions' => 'Please upload logo image dimension (600 * 600) pixel images !',
                //'images.max' => "Maximum file size to upload is (1000 KB). If you are uploading a photo, try to reduce its resolution to make it under 1000 KB",

                'logo_image.size' => "Maximum file size to upload is (1000 KB). If you are uploading a photo, try to reduce its resolution to make it under 1000 KB",
               // 'images.size' => "Maximum file size to upload is (1000 KB). If you are uploading a photo, try to reduce its resolution to make it under 1000 KB",
                
                
                'country_code.regex' =>  'Phone Number Country Code Is Not Valid',
                  'country_code2.regex' =>  'Mobile Number Country Code Is Not Valid',

                'country_code.not_in' =>  'Phone Number Country Code Zero Not Accepted! Please Add Greater Than Zero',
            	'country_code2.not_in' =>  'Mobile Number Country Code Zero Not Accepted! Please Add Greater Than Zero',
                
                'latlongaddress.required'=> 'Full Address Field Is Required', 
                'name.required'=> 'Hospital Name Field Is Required', 
                'country_code.required'=> 'Country Code Field Is Required',
                'country_code2.required'=> 'Mobile No Country Code Field Is Required',
                'phone_number.required'=> 'Phone Number Field Is Required', 
                'mobile_number.required'=> 'Mobile No Field Is Required',
                'lat.required'=> 'Address Latitude Field Is Required',
                'lon.required'=> 'Address Longitude Field Is Required',
                'working_day.required'=> 'Working Days Field Is Required', 
                'start_time.required'=> 'Starting Time Field Is Required', 
                'end_time.required'=> 'Ending Time Field Is Required', 
                'images.required'=> 'Image Field Is Required', 
                'images.*.dimensions' => "Maximum multiple image dimensions to upload is (600 * 600)",
                'images.*.max' => "Maximum multiple image size to upload is (1000 KB). If you are uploading a photo, try to reduce its resolution to make it under 1000 KB",
               
             ]);

          
            if ($validator->fails()) {
                    return response()->json(array('error' => $validator->errors()->first()));
            }
            \DB::beginTransaction();
            try {
                
            $hospital = Hospital::where('id', $id)->first();
            
            // if ($request->hasFile('logo_image')) {
            //         $file_logo = $request->file('logo_image');
            //         $baseurl_logo = env('APP_URL');
            //         $name_logo = time() . $file_logo->getClientOriginalName();
            //         $file_logo->move(public_path() . "/images/hospitals/", $name_logo);
            //         $filePath_logo = $baseurl_logo."/public/images/hospitals/" . $name_logo;
            //         $hospital->logo = $filePath_logo;  
            // } else{
            //      $hospital->logo = $hospital->logo;  
            // }       
            
            if($request->input('imgdata') != ''){
            
                $base64_image = $request->input('imgdata');
                if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                    $data = substr($base64_image, strpos($base64_image, ',') + 1);
                    $data = base64_decode($data);
                    $filename = time() . '-image.png';
                    \Storage::disk('public')->put($filename , $data);
                    $hospital->logo  = env('APP_URL').'/storage/app/public/'.$filename;
                }
            } else{
              
                $hospital->logo = $hospital->logo;  
            } 
            
                    
            $hospital->name = $request->input('name');
            $hospital->description =  $request->input('description') ? $request->input('description') : '';
            $hospital->country_code = $request->input('country_code');
            $hospital->phone_number = $request->input('phone_number');
            $hospital->address_latitude = $request->input('lat');
            $hospital->address_longitude = $request->input('lon');
            $hospital->address = $request->input('latlongaddress') ? $request->input('latlongaddress') : '';
            $hospital->street = $request->input('street');
            $hospital->apartment = $request->input('apartment');
            if($request->input('office')){
                $hospital->office = $request->input('office');    
            }
            $hospital->city = $request->input('city');
            $hospital->state = $request->input('state');
            $hospital->country = $request->input('country') ? $request->input('country') : '';
            $data = $request->input('working_day'); 
            if($data){
                $hospital->start_day = $firstEle = $data[0];
                $hospital->end_day = $lastEle = $data[count($data) - 1];
            }else{
                $hospital->start_day = 'Mon';
                $hospital->end_day = "";
            }
            
             #closed_day_count_here
            $all_days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
            $days = array();
            foreach($all_days as $data){
                if(!in_array($data, $request->input('working_day'), TRUE)){
                    array_push($days, $data);
                }
            }
    
            $hospital->closed_day = implode(",", $days);
            $hospital->working_days = implode(",", $request->input('working_day'));
            $hospital->start_time =  date("H:i", strtotime($request->input('start_time')));
            $hospital->end_time = date("H:i", strtotime($request->input('end_time')));           
            $hospital->facebook_link = $request->input('facebook') ? $request->input('facebook') : '';
            $hospital->instagram_link = $request->input('instagram') ? $request->input('instagram') : '';
            $hospital->twitter_link = $request->input('twitter') ? $request->input('twitter') : '';
            $hospital->dribble_link = $request->input('website') ? $request->input('website') : '';
            $hospital->country_code2 = $request->input('country_code2');
            $hospital->mobile_number =  $request->input('mobile_number');
            $hospital->services = '';
            $hospital->offerable = $request->input('offerable') ? 1 : 0;
            $hospital->full_time = $request->input('hospital_time') ? "true" : "false";
            $hospital->update();
             
            
             #multiple image upload
             if($request->file('images')){
                if(count($request->file('images')) > 4){
                    return response()->json(array('error' => 'Please upload maximum three image !'));
                }
             }
            
            if ($request->hasFile('images')) {
                    
            
                $images = $request->file('images');  
                
                foreach($images as $image){
                    
                    $file = $image;
                    $baseurl = env('APP_URL');
                    $name = time() . $file->getClientOriginalName();
                    $file->move(public_path() . "/images/hospitals/", $name);
                    $filePath = $baseurl."/public/images/hospitals/" . $name;
                    
                    $images = new HospitalImages();
                    $images->hospital_id = $hospital->id;
                    $images->image = $filePath;
                    $images->save();
                    
                }    
                
            
            }
            
             
           
            
           if($request->input('sname_new')){

	$validator = \Validator::make($request->all(),[
	'sname_new.*' => 'required',
                'sprice1_new.*' => 'required',
                'sprice2_new.*' => 'required',
                
                ],
               [
                'sname_new.*.required'=> 'Service Name Field Is Required', 
                'sprice1_new.*.required'=> 'Service Before Discount Price Field Is Required', 
                'sprice1_new.*.not_in' => 'Service Price Zero Not Accepted! Please Add Greater Than Zero',
                'sprice2_new.*.not_in' => 'Service Price Zero Not Accepted! Please Add Greater Than Zero',
                'sprice2_new.*.required'=> 'Service After Discount Price Field Is Required', 
                ]);

	if ($validator->fails()) {
                    return response()->json(array('error' => $validator->errors()->first()));
                  }

                $post_count = count($request->input('sname_new')); 
                $post1 = array(); //create array
                $post2 = array();
                $post3 = array();
                $post1 = $request->input('sname_new');
                $post2 = $request->input('sprice1_new');
                $post3 = $request->input('sprice2_new');
                
                for ($i = 0; $i < $post_count; $i++) {

             if( $post2  <  $post3){
 	            return response()->json(array('error' => 'Service Price Before Discount Must Be Greater Then Service Price After Discount'));
             }
                    
                    $service = new Services;
                    $service->name = $post1[$i];
                    $service->price_before_discount = $post2[$i];
                    $service->price_after_discount = $post3[$i];
                    $service->hospital_id = $hospital->id;
                    $service->save();
                
                }
            }
            
            \DB::commit();
            return response()->json(['success'=>'Hospital Update Successfully.']);

        } catch (\Exception $exception) {
            \DB::rollback();
            return response()->json(['error'=> $exception->getMessage()]);
        } catch (\Throwable $exception) {
            \DB::rollback();
            return response()->json(['error'=> $exception->getMessage()]);
        }
       
    }
    
    
    public function serviceDelete($id){
       
       $service = Services::where('id', $id)->first();
       $service->delete();
       
       return response()->json(['success'=>'Service Delete Successfully']);
       
    }
    
    public function imageDelete($cat, $id){
    
        $data = HospitalImages::where('hospital_id',$cat)->where('id', $id)->first();
        $data->delete();
        
        return response()->json(['success'=>'Hospital Image Delete Successfully']);
        
      
    }
    
    public function hospitalDelete($id){
       
        $hospital = Hospital::where('id', $id)->first();
        
        #check_hospital_child_exist
        $service_exist = Services::where('hospital_id', $hospital->id)->first();
        
       
        if(isset($service_exist) && ($service_exist->count() > 0)){
            return response()->json([
                'status' => 'error',
            ]);
            
        }else{
            
            #hospital_images_dataGet
            $hospital_images = HospitalImages::where('hospital_id', $hospital->id)->delete();

            $hospital_offer = Offers::where('hospital_id', $hospital->id)->get();
            if($hospital_offer->count() > 0){
                foreach($hospital_offer as $offer){
                    $offer->delete();
                }
            }

        
            $hospital->delete();
            
            return response()->json([
                'status' => 'success',
            ]);
        }
    }

    public function hospitalDisable(Request $request, $id){
        $hospital = Hospital::where('id', $id)->first();
        $hospital_services = Services::where('hospital_id', $hospital->id)->get();
    
        if($hospital_services->count() > 0){
            foreach($hospital_services as $service){
                $service->status = 'inactive';
                $service->update();
            }
        }

        
        $hospital_offer = Offers::where('hospital_id', $hospital->id)->get();
        if($hospital_offer->count() > 0){
            foreach($hospital_offer as $offer){
                $offer->status = 'inactive';
                $offer->update();
            }
        }

        $hospital->status = 'inactive';
        $hospital->update();
        
        return response()->json([
                'status' => 'success',
        ]);
            
    }
    
    public function hospitalEnable(Request $request, $id){
        $hospital = Hospital::where('id', $id)->first();

        $hospital_services = Services::where('hospital_id', $hospital->id)->get();
    
        if($hospital_services->count() > 0){
            foreach($hospital_services as $service){
                $service->status = 'active';
                $service->update();
            }
        }

        
        $hospital_offer = Offers::where('hospital_id', $hospital->id)->get();
        if($hospital_offer->count() > 0){
            foreach($hospital_offer as $offer){
                $offer->status = 'active';
                $offer->update();
            }
        }


        $hospital->status = 'active';
        $hospital->update();
        
        return response()->json([
                'status' => 'success',
        ]);
            
    }
}
