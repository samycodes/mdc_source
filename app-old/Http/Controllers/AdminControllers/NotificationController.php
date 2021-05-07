<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Objects\Notification;
use Carbon\Carbon;
use Datetime;

class NotificationController extends Controller
{
    
     public function index(){
         
  
        $notifications = Notification::select('notification.*')
                                    ->orderBy('id','desc')
                                    ->distinct('receiver_id')
                                    ->where('read_status','unread')
                                    ->get();
        
        if($notifications){
            return view('backend.notifications.index',compact('notifications'));
        }
        
    }
    
    public function readStatus(){
        
        $notification = Notification::all();
        
        foreach($notification as $data){
            $data->read_status = 'read'; 
            $data->save();
        }
        
        return redirect()->route('notification.index')->with('success','Read Notification Successfully');
        
    }
    
}
