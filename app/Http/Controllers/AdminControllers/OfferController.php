<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\Offers;
use App\Objects\Banner; 
use App\Objects\Hospital;
use App\Objects\APIKey;
use App\Objects\AccessToken;

class OfferController extends Controller
{
    public function pushNotification($data, $decive_token)
    {
    

        $reg_id = $decive_token; 
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

        
     return $result . "\n\n";

    }

    public function pushNotificationNew($noti)
    {
       
         $andUserToken = \DB::table('access_token')
                    ->select('access_token.device_token')
                    ->leftJoin('users', 'access_token.user_id', '=', 'users.id')
                    ->whereIn('access_token.user_id',$noti['id'])
                    ->where('access_token.device_token', '!=', '')
                    ->pluck('access_token.device_token')
                    ->toArray();

        if(!empty($andUserToken)){

            $reg_id =$andUserToken; 
            $fcmMsg = array(
            'body' => $noti['mdesc'],
            'title' => $noti['mtitle'],
            'sound' => "default",
            'color' => "#203E78",
            );
            
            $fcmFields = array(
            'registration_ids' => $andUserToken,
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
                return $result;

        }else{
            return true;
        }

    }
    
    
    public function index(){
        try {

            $offers = Offers::orderBy('id','desc')->get();

            return view('backend.offers.index', compact('offers'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }
    
    public function add(){
        $hospitals = Hospital::all();
        return view('backend.offers.add', compact('hospitals'));
    }
    
    public function save(Request $request){
        
        $validator = \Validator::make($request->all(),[
                'hospital_id' => 'required',
                'title' => 'required',
                'description' => 'required|max:120',
                'image' => 'required|max:1000|dimensions:max_width=600,max_height=600, min_width=10, min_height=10',
            ],[
                'title.required' => 'The offer title field is required !',
                'hospital_id.required' => 'Hospital Name field is required !',
                'description.required' => 'The offer description title field is required !',
                'image.required' => 'The offer image field is required !',
                'image.dimensions' => 'Please upload offer image dimension (600 * 600) pixel!',
                
                ]);

            if ($validator->fails()) {
                
                return response()->json(array('error' => $validator->errors()->first()));
            }

            if(!$request->hasFile('image')) {
                return redirect()->back()->with('error','upload_file_not_found');
            }

           
            $file = $request->file('image');
            $baseurl = 'http://128.199.31.19/mdc/';
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/images/", $name);
            $filePath = $baseurl."/public/images/" . $name;
           
            
            $offer= new Offers();
            $offer->title = $request->input('title');
            $offer->hospital_id = $request->input('hospital_id');
            $offer->description = $request->input('description');
            $offer->offer_percentage = 0;
            $offer->supplier_id = 0; 
            $offer->image = $filePath;
            $offer->save();
            
            $dObj = \DB::table('users')->orderBy('id','desc')->get();
            $result = $dObj->pluck('id')->toArray();

            $noti['mdesc'] = 'New Offer  ' . $offer->title . ' Added.';
            $noti['mtitle'] = 'New Notification';
            if(!empty($result)){
                $strUser = implode(',', $result);
                $noti['device_token'] = $strUser;
                $noti['id'] = $result;
                $this->pushNotificationNew($noti);
            }
            
            
            
            
            return response()->json(['success'=>'New Offer Added Successfully !']);

    }
    
    public function edit($id){
        $offer = Offers::where('id', $id)->first();
        $hospitals = Hospital::all();
        return view('backend.offers.edit',compact('offer','hospitals'));
    }
    
    public function update(Request $request, $id){
        $validator = \Validator::make($request->all(),[
                'hospital_id' => 'required',
                'title' => 'required',
                'description' => 'required|max:120',
                'image' => 'max:1000|dimensions:max_width=600,max_height=600, min_width=10, min_height=10',
            ],[
                'title.required' => 'The offer title field is required !',
                'hospital_id.required' => 'Hospital Name field is required !',
                'description.required' => 'The offer description title field is required !',
                'image.dimensions' => 'Please upload offer image dimension (600 * 600) pixel!',
                
                ]);

            if ($validator->fails()) {
                
                return response()->json(array('error' => $validator->errors()->first()));
            }

            $offer= Offers::where('id', $id)->first();
 
            if($request->hasFile('image')){
            $file = $request->file('image');
            $baseurl = 'http://128.199.31.19/mdc/';
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/images/", $name);
            $filePath = $baseurl."/public/images/" . $name;
            $offer->image = $filePath;
            }
            
            $offer->title = $request->input('title');
            $offer->hospital_id = $request->input('hospital_id');
            $offer->description = $request->input('description');
            $offer->update();
            
            return response()->json(['success'=>'Offer Update Successfully !']);
    }
    
    public function delete($id){
        $offer = Offers::where('id', $id)->first();
        $offer->delete();
        
        $msg = 'Offer record has been deleted successfully!';

        return response()->json([
            'status' => 'success',
        ]);
       
    }
    
    
     public function Disable(Request $request, $id){
        $offer = Offers::where('id', $id)->first();
        $offer->status = 'inactive';
        $offer->update();

        return response()->json([
                'status' => 'success',
        ]);

    }

    public function Enable(Request $request, $id){
        $offer = Offers::where('id', $id)->first();
        $offer->status = 'active';
        $offer->update();

        return response()->json([
                'status' => 'success',
        ]);

    }


    #bannermodule

    public function bannerIndex(){
        try {

           $banner = Banner::orderBy('id','desc')->get();

           return view('backend.banner.index', compact('banner'));

       }catch (\Exception $e) {
           return redirect()->back()->with('error' , $e->getMessage());
       }
    }

   public function addBanner(){
    $hospitals = Hospital::all();
    return view('backend.banner.add', compact('hospitals'));
     }

   public function saveBanner(Request $request){
    $validator = \Validator::make($request->all(),[
            'hospital_id' => 'required',
           'image' => 'required|max:1000|dimensions:max_width=600,max_height=600, min_width=10, min_height=10',
       ],[
           'image.required' => 'The banner image field is required !',
           'image.dimensions' => 'Please upload banner image dimension (600 * 600) pixel!',
           'hospital_id.required' => 'Hospital Name field is required !',
           
           ]);

       if ($validator->fails()) {
           return response()->json(array('error' => $validator->errors()->first()));
       }

       if ($request->input('hospital_id') == 0) {
        return response()->json(array('error' => 'Hospital Name field is required' ));
        }

       if(!$request->hasFile('image')) {
           return redirect()->back()->with('error','upload_file_not_found');
       }

      
       $file = $request->file('image');
       $baseurl ='http://128.199.31.19/mdc/';
       $name = time() . $file->getClientOriginalName();
       $file->move(public_path() . "/images/", $name);
       $filePath = $baseurl."/public/images/" . $name;
      
       
       $data = new Banner();
       $data->image = $filePath;
       $data->hospital_id = $request->input('hospital_id'); 
       $data->save();
       
            // $users = \DB::table('users')->where('notification_status','on')->pluck('id');
           
            
            // $userToken = AccessToken::select('device_token')->whereIn('user_id', $users)->where('device_token', '!=', null)->get();
           
           
            // $data = array('mtitle' =>'New Notification','mdesc' =>'New Banner Added.' );
            
            // foreach($userToken as $token){
                 
                
            //     $device_token = $token['device_token'];
            //     $this->pushNotification($data, $device_token);
      
            // }

            $dObj = \DB::table('users')->orderBy('id','desc')->get();
            $result = $dObj->pluck('id')->toArray();

            $noti['mdesc'] = 'New Banner  ' . $offer->title . ' Added.';
            $noti['mtitle'] = 'New Notification';
            if(!empty($result)){
                $strUser = implode(',', $result);
                $noti['device_token'] = $strUser;
                $noti['id'] = $result;
                $this->pushNotificationNew($noti);
            }
            
       
       return response()->json(['success'=>'New Banner Added Successfully !']);

    }

    public function editBanner($id){
        $data = Banner::where('id', $id)->first();
        $hospitals = Hospital::all();
        return view('backend.banner.edit',compact('data','hospitals'));
    }

    public function updateBanner(Request $request, $id){
        $validator = \Validator::make($request->all(),[
            'hospital_id' => 'required',
             'image' => 'max:1000|dimensions:max_width=600,max_height=600, min_width=10, min_height=10',
       ],[
         
           'hospital_id.required' => 'Hospital Name field is required !',
            'image.dimensions' => 'Please upload banner image dimension (600 * 600) pixel!',
           
           ]);

       if ($validator->fails()) {
           return response()->json(array('error' => $validator->errors()->first()));
       }

        $banner = Banner::where('id', $id)->first();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $baseurl = 'http://128.199.31.19/mdc/';
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/images/", $name);
            $filePath = $baseurl."/public/images/" . $name;
            $banner->image = $filePath;
        }
        $banner->hospital_id = $request->input('hospital_id'); 
        $banner->update();
        
        return response()->json(['success'=>'Banner Update Successfully !']);
    }   

    public function deleteBanner($id){
        $data = Banner::where('id', $id)->first();
        $data->delete();
        
        $msg = 'Banner record has been deleted successfully!';

        return response()->json([
            'status' => 'success',
        ]);
    
    }


}
