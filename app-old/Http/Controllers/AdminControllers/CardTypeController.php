<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\CardType;

class CardTypeController extends Controller
{
    public function index(){
        $cardtypes = CardType::orderBy('id','desc')->get();

        if(isset($cardtypes)){
            return view('backend.cardtype.index', compact('cardtypes'));
        }else{
            return redirect()->back()->with('error', 'Data Not Found !');
        }
    }

    public function add(){
        return view('backend.cardtype.add');
    }

    public function save(Request $request)
    {
      $validator = \Validator::make($request->all(),[



          'name' => 'required',
          'price' => 'required|numeric|not_in:0'
      ],
        [
          'name.required'=> 'Card Type Field Is Required',
          'price.required' => 'Card Price Field Is Required',
          'price.numeric'  => 'Card Price Field value must be numeric',
          'price.not_in' => 'Card Price Zero Not Accepted! Please Add Greater Than Zero',
       ]);
       if ($validator->fails()) {
               return response()->json(array('error' => $validator->errors()->first()));
       }
       $cardtype = new CardType();
       $cardtype->name = $request->input('name');
       $cardtype->price =  $request->input('price');
       // $cardtype->status = $request->input('status');
       if($cardtype->save())
       {
         return response()->json(['success'=>'New Card Type Added Successfully.']);
       }
    }

    public function cardTypeDisable(Request $request, $id){
        $hospital = CardType::where('id', $id)->first();
        $hospital->status = 'inactive';
        $hospital->update();

        return response()->json([
                'status' => 'success',
        ]);

    }

    public function cardTypeEnable(Request $request, $id){
        $hospital = CardType::where('id', $id)->first();
        $hospital->status = 'active';
        $hospital->update();

        return response()->json([
                'status' => 'success',
        ]);

    }

    public function edit($id){
        $cardtype = CardType::where('id', $id)->first();
        return view('backend.cardtype.edit',compact('cardtype'));
    }

    public function update(Request $request, $id){
      $validator = \Validator::make($request->all(),[



          'name' => 'required',
          'price' => 'required|numeric|not_in:0',
      ],
        [
          'name.required'=> 'Card Type Field Is Required',
          'price.required' => 'Card Price Field Is Required',
          'price.numeric'  => 'Card Price Field value must be numeric',
          'price.not_in' => 'Card Price Zero Not Accepted! Please Add Greater Than Zero',
       ]);
       if ($validator->fails()) {
               return response()->json(array('error' => $validator->errors()->first()));
       }

       $cardtype = CardType::where('id', $id)->first();
       $cardtype->name = $request->input('name');
       $cardtype->price =  $request->input('price');
       $cardtype->update();
       return response()->json(['success'=>'Card Type Edit Successfully.']);
    }

    public function cardtypeDelete($id){

        $cardtype = CardType::where('id', $id)->first();

        #check_hospital_child_exist

            $cardtype->delete();

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
