<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Objects\Card;
use Carbon\Carbon;

class CardController extends Controller
{

    public function download($id){
        
            $card = Card::select('document_upload')->where('id', $id)->first();
           
            $filepath1 = $card['document_upload'];
            $url = $card['document_upload'];
            $new = substr($url, strrpos($url, '/') + 1);
            $filepath = public_path('images/cards/').$new;
            $data = storage_path('app/public/').$new;
            
            return \Response::download($data);
        
    
        }


    public function requestSingle(){

      $user = User::orderBy('id','desc')->get();

      $cards = array();
      foreach ($user as $key => $s) {
          $cards[] = Card::where('user_id', $s->id)->where('type','single')->orderBy('id','desc')->first();
      }

        return view('backend.cards.request_user',compact('cards'));

    }

    public function requestFamily(){

      $user = User::orderBy('id','desc')->get();

      $cards = array();
      foreach ($user as $key => $s) {
          $cards[] = Card::where('user_id', $s->id)->where('type','family')->orderBy('id','desc')->first();
      }

     
        return view('backend.cards.request_family',compact('cards'));

    }


    public function singleCardListing(){
        try {

            $cards = Card::where('type','single')->orderBy('id','desc')->get();

            return view('backend.cards.single',compact('cards'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }

    public function singleCardView($id){
        try {

            $user = User::where('id', $id)->first();
            $card = Card::where('user_id', $user->id)->where('type', 'single')->get();
            $card_mul = Card::where('user_id', $user->id)->where('type', 'family')->get();
            
            return view('backend.cards.singlecard_view',compact('user','card','card_mul'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }

    public function familyCardVieww($id){
        try {

            $user = User::where('id', $id)->first();
            $card = Card::where('user_id', $user->id)->where('type', 'single')->get();
            $card_mul = Card::where('user_id', $user->id)->where('type', 'family')->get();

            return view('backend.cards.familycard_view',compact('user','card','card_mul'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }



     public function familyCardListing(){
        try {

            $cards = Card::where('type','family')->orderBy('id','desc')->get();

            return view('backend.cards.family',compact('cards'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }

     public function familyCardView($id){
        try {

            $card = Card::where('type','family')->where('id', $id)->first();

            return view('backend.cards.familycard_view',compact('card'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }


}
