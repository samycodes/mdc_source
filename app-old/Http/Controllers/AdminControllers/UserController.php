<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use App\Objects\Aboutus;
use App\Objects\Policy;
use App\Objects\Card;
use App\Objects\Condition;
use App\Objects\APIKey;
use App\Objects\AccessToken;
use DB;

class UserController extends Controller
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


 public function condition(){
        $data = \DB::table('conditions')->first();
        return view('backend.condition.index', compact('data'));
    }
    
    public function conditionEdit(){
        $data = \DB::table('conditions')->first();
        return view('backend.condition.edit', compact('data'));
    }
    
    public function conditionUpdate(Request $request){


        $validator = \Validator::make($request->all(),[
                'title' => 'required',
                'description' => 'required',
        ], [
            'title.required'=> 'Terms of Service Title Field is Required', 
            'description.required'=> 'Terms of Service Description Field is Required', 
           
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=> $validator->errors()->first() ]);
        }
	

        $data = Condition::first();
        $data->title  = $request->input('title');
        $data->description = $request->input('description');
        $data->update();
        
        return response()->json(['success'=>'Terms of Service  Update Successfully']);
    }
    
    
    public function policy(){
        $data = Policy::first();
        return view('backend.policies.index', compact('data'));
    }
    
    public function policyEdit(){
        $data = Policy::first();
        return view('backend.policies.edit', compact('data'));
    }
    
    public function updatePolicy(Request $request){
        $validator = \Validator::make($request->all(),[
                'title' => 'required|max:60',
                'description' => 'required|max:12000',
        ], [
            'title.required'=> 'Content Title Field is Required', 
            'description.required'=> 'Contant Description Field is Required', 
           
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=> $validator->errors()->first() ]);
        }

        $data = Policy::first();
        $data->title  = $request->input('title');
        $data->description = $request->input('description');
        $data->update();
        
        return response()->json(['success'=>'Policy Update Successfully']);
    }
    
    public function aboutus(){
        $data = Aboutus::first();
        return view('backend.aboutus.index', compact('data'));
    }
    
    public function editAboutUs(){
        $aboutus = Aboutus::first();
        return view('backend.aboutus.edit', compact('aboutus'));
    }
    
    
    public function updateAboutUs(Request $request){
        $validator = \Validator::make($request->all(),[
                'title' => 'required|max:60',
                'description' => 'required|max:1200',
        ], [
            'title.required'=> 'Content Title Field is Required', 
            'description.required'=> 'Contant Description Field is Required', 
           
        ]);

        if ($validator->fails()) {
 	return response()->json(array('error' => $validator->errors()->first()));
                 
        }

        $aboutus = AboutUs::orderBy('id','asc')->first();
        $aboutus->title  = $request->input('title');
        $aboutus->description = $request->input('description');
        $aboutus->update();
        
       return response()->json(['success'=>'Data Update Successfully']);

       
    }
    
    
    
    
    
    
    public function index(){
        try {

            $users = User::where('fullname','!=','admin')->orderBy('id','desc')->get();

            return view('backend.users.index', compact('users'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }

    public function view($id){
        $user = User::where('id', $id)->first();
        
        $card = Card::where('user_id', $user->id)->where('type', 'single')->get();
        $card_mul = Card::where('user_id', $user->id)->where('type', 'family')->get();
        
        if(isset($user)){
            return view('backend.users.profile',compact('user','card','card_mul'));
        }else{
            return redirect()->back()->with('error' , 'Data Not Found');
        }

    }


    public function changeUserStatus(Request $request)
    {

        $user = User::where('id', $request->userid)->first();

        if($user->status=='active')
        {
            try {

                User::where('id',$request->userid)->update(['status' => 'inactive']);

                $token_apikey = AccessToken::where('user_id', $user->id)->value('apikey_id');
                $token = AccessToken::where('user_id', $user->id)->delete();
                $key = APIKey::where('id', $token_apikey )->delete();
            
                return response()->json(['success'=>'User status change successfully.']);

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error occure while fatching user data.' . $e->getMessage());
            }
        }
        else
        {
            try {

                User::where('id',$request->userid)->update(['status' => 'active']);

                return response()->json(['success'=>'User status change successfully.']);

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error occure while fatching user data.' . $e->getMessage());
            }

        }

    }

    public function approveCrd(Request $request)
    {

      $id = $request->id;
      $card_status = $request->card_status;
      $type = $request->type;
      $status = $request->status;
      $card_id = $request->card_id;

      if($card_id=="")
      {
        DB::table('card')->where('user_id', $id)->where('type', $type)->update(['card_status' => $card_status, 'accepted_date' =>  Carbon::now()->format('Y-m-d') , 'expired_date' => Carbon::now()->addYear(1)->format('Y-m-d')]);
      }
      else
      {
        DB::table('card')->where('user_id', $id)->where('type', $type)->where('id' , $card_id)->update(['card_status' => $card_status, 'accepted_date' =>  Carbon::now()->format('Y-m-d') , 'expired_date' => Carbon::now()->addYear(1)->format('Y-m-d') ]);
      }

            $user = User::where('notification_status','on')->where('id',$id)->first();
            $statuschk = DB::table('card')->where('user_id', $id)->where('type', $type)->where('id' , $card_id)->first('card_status');
            
            $userToken = AccessToken::select('device_token')->where('user_id', $user->id)->where('device_token', '!=', null)->first();
         
	 if( $statuschk->card_status == 'completed'){
	     $data = array('mtitle' =>'New Notification','mdesc' => $user->fullname . ' Your Card Is Approved' );
	}
	if($statuschk->card_status == 'rejected'){
	     $data = array('mtitle' =>'New Notification','mdesc' => $user->fullname . ' Your Card Is Rejected' );
 	} 
           
           
            $device_token = $userToken['device_token'];
            $this->pushNotification($data, $device_token);
	

      return redirect()->back()->with('success', 'User card ' . $status);
    }
}
