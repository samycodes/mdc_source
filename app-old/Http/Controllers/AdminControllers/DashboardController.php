<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class DashboardController extends Controller
{
    public function dashboard(){
        try {

          $users = DB::table('users')->where('fullname', '<>' , 'Admin')->count();
          $users_active = DB::table('users')->where('status', 'active')->where('fullname', '<>' , 'Admin')->count();
          $users_inactive = DB::table('users')->where('status', 'inactive')->where('fullname', '<>' , 'Admin')->count();
          $users_inactive = DB::table('users')->where('status', 'inactive')->where('fullname', '<>' , 'Admin')->count();
          
          
          $cats = DB::table('hospital')->orderBy('id', 'desc')->select('name as newd')->where('status','active')->take(5)->get();
          $data = array();
            
            $Data = array();
            foreach($cats as $cat){
              
               
                $new = array(
                      "value" => 10,
                      "name" => $cat->newd,
                    );
                    
                array_push($Data,$new);    
            }
       
          $hospital = DB::table('hospital')->count();

        return view('backend.dashboard', compact('users', 'users_active', 'users_inactive' ,'hospital','Data'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }
}
