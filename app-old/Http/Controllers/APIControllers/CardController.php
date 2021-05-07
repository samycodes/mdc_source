<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\Hospital;
use App\Objects\HospitalImages;
use App\Objects\Offers;
use App\Objects\Suppliers;
use App\Objects\Services;
use App\Objects\Notification;
use App\Objects\Card;
use App\Objects\CardType;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
        public $i = 0;
        
        public function addSingleCard(Request $request){
            
            $id = $request->header('userid');
            $user = User::where('id', $id)->first();
            
            $validator = \Validator::make(request()->all(), [
                'fullname' => 'required|max:20',
                'country_code' => 'required',
                'mobile_number' => 'required|max:8',
                'gcc_id' => 'required|max:20',
                'city' => 'required',
                'country' => 'required',
                'card_type' => 'required|integer',
                'document_type' => 'required',
                'gender' => 'required|in:male,female',
                'price' => 'required|numeric|regex:/^\d*(\.\d{1,2})?$/',
                'document_upload' => 'required',
            ],[
                'gcc_id.required' => 'The CPR/GCC ID field is required'
                ]);
    
            if (!empty($validator->fails()))
            {
                return response()->json(["status" => 0, "message" => $validator->errors()->all()[0]]);
            }
            
            if (empty($user))
            {
                return response()->json(["status" => 0, "message" => 'User id field is required']);
            }
            
         
            $card = new Card();
            
           if($request->input('document_upload') != '0'){
                    $base64_image = 'data:image/jpeg;base64,' . $request->input('document_upload');
                    if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                        $data = substr($base64_image, strpos($base64_image, ',') + 1);
                        $data = base64_decode($data);
                        $filename = time() . '-image.png';
                        Storage::disk('public')->put($filename , $data);
                        $card->document_upload = 'http://128.199.31.19/mdc/storage/app/public/'.$filename;
                }
             }  
                 
          
            $card->fullname = $request->input('fullname');
            $card->country_code = $request->input('country_code');
            $card->mobile_number = $request->input('mobile_number');
            $card->gcc_id = $request->input('gcc_id');
            $card->card_type = $request->input('card_type');
            $card->document_type = $request->input('document_type');
            $card->country = $request->input('country');
            $card->city = $request->input('city');
            $card->price = 0;
            $card->gender = $request->input('gender');
            $card->user_id = $user->id;
            $card->occured_on = Carbon::now();
            $date = Carbon::now();
            $card->created_date = $date->format('Y-m-d');
            $card->policy =  0;
            $card->accepted_date =  '';
            $card->expired_date =  '';
            $card->save();
            
            $card_type = CardType::where('id',$card->card_type)->first();
            $card->price = $card_type->price;
            $card->policy = 1100 + $card->id;
            $card->update();
            
            
            
            
            //$notification = Notification
            $notification = new Notification();
            $notification->title = 'Single Card';
            $notification->message = 'Your single card request has reached us successfully';
            $notification->sender_id = '1' ;
            $notification->receiver_id = $user->id ; 
            $notification->save();
           
           
           if(isset($card))
            {
              return response()->json(["status" => 1, "price" => $card->price ,"message" => "Single Card Register Successfully"]);
            }
            else
            {
              return response()->json(["status" => 0, "message" => "Data not found."]);
            }
        

        }
        
        public function validations($input, $type)
        {
            $errors = [];
            $error = false;
            if ($type == "card") {
                $validator = \Validator::make($input, [
                        'fullname' => 'required|max:20',
                        'country_code' => 'required',
                        'mobile_number' => 'required|max:8',
                        'gcc_id' => 'required|max:20',
                        'city' => 'required',
                        'country' => 'required',
                        'card_type' => 'required|integer',
                        'document_type' => 'required|integer',
                        'gender' => 'required||in:male,female',
                        'price' => 'required|numeric|regex:/^\d*(\.\d{1,2})?$/',
                        'document_upload' => 'required',
                        'type' => 'required|in:single,family',
                ]);
                if ($validator->fails()) {
                    $error = true;
                    $errors = $validator->errors()->first();
                }
            }
            return ["error" => $error, "errors" => $errors];
        }
        
        public function addFamilyCard(Request $request){
            
            
            
            $id = $request->header('userid');
            $user = User::where('id', $id)->first();
            
            $data = json_decode(json_encode($request->json()->all()),true);
            
            $new_price = array();
            $data1 = 0;
            foreach ($data as $val)
            {
                
                $input      = $val;
                $validate     = $this->validations($input, "card");
                
                if ($validate["error"]) {
                    return response()->json(["status" => 0, "message" => $validate['errors']]);
                }
            	
            	$card = new Card();
            		
            	 if($val['document_upload'] != '0'){
                    $base64_image = 'data:image/jpeg;base64,' . $val['document_upload'];
                    if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                        $data = substr($base64_image, strpos($base64_image, ',') + 1);
                        $data = base64_decode($data);
                        $filename = time() . '-image.png';
                        Storage::disk('public')->put($filename , $data);
                        $card->document_upload = 'http://128.199.31.19/mdc/storage/app/public/'.$filename;
                    }
                 }    
      
            
                $card->fullname = $val['fullname'];
                $card->country_code = $val['country_code'];
                $card->mobile_number = $val['mobile_number'];
                $card->gcc_id = $val['gcc_id'];
                $card->card_type = $val['card_type'];
                $card->document_type = $val['document_type'];
                $card->country = $val['country'];
                $card->city = $val['city'];
                $card->price = $val['price'];
                $card->gender = $val['gender'];
                $card->user_id = $user->id;
                $card->occured_on = Carbon::now();
                $date = Carbon::now();
                $card->created_date = $date->format('Y-m-d');
                $card->policy =  0;
                $card->accepted_date =  '';
                $card->expired_date =  '';
                $card->type = $val['type'];
                $card->save();
                
                $card_type = CardType::where('id',$card->card_type)->first();
                $card->price = $card_type->price;
                $card->policy = 1100 + $card->id;
                $card->update();
            
                
                
                $data1 =  number_format((float)$data1 + $val['price'], 2, '.', '');
               
            }
          
            $notification = new Notification();
            $notification->title = 'Family Card';
            $notification->message = 'Your family card request has reached us successfully';
            $notification->sender_id = '1' ;
            $notification->receiver_id = $user->id ; 
            $notification->save();
            
            
            if(isset($card))
            {
              return response()->json(["status" => 1, "price" => $data1 ,"message" => "Family Card Register Successfully"]);
            }
            else
            {
              return response()->json(["status" => 0, "message" => "Data not found."]);
            }
        
           
        }
        
        public function cardHistory(Request $request){
            
            $id = $request->header('userid');
            $user = User::where('id', $id)->first();
            
            $cards = Card::select('id','fullname','policy','gcc_id','card_status','created_date','accepted_date','expired_date')->where('user_id', $user->id)->get();
            
            
            if(count($cards) > 0)
            {
              return response()->json(["status" => 1, "data" => $cards ,"message" => "Data get successfully."]);
            }
            else
            {
              return response()->json(["status" => 0, "message" => "Data not found."]);
            }
                
            }
}
