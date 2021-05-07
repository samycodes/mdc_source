<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\DocumentType;

class DocumentTypeController extends Controller
{
    public function index(){
        $documenttypes = DocumentType::orderBy('id','desc')->get();

        if(isset($documenttypes)){
            return view('backend.documenttype.index', compact('documenttypes'));
        }else{
            return redirect()->back()->with('error', 'Data Not Found !');
        }
    }

    public function add(){
        return view('backend.documenttype.add');
    }

    public function save(Request $request)
    {
      $validator = \Validator::make($request->all(),[



          'name' => 'required',
      ],
        [
          'name.required'=> 'Document Type Field Is Required',
       ]);
       if ($validator->fails()) {
               return response()->json(array('error' => $validator->errors()->first()));
       }
       $documenttype = new DocumentType();
       $documenttype->name = $request->input('name');
       // $cardtype->status = $request->input('status');
       if($documenttype->save())
       {
         return response()->json(['success'=>'New Document Type Added Successfully.']);
       }
    }

    public function DocumentTypeDisable(Request $request, $id){
        $documenttype = DocumentType::where('id', $id)->first();
        $documenttype->status = 'inactive';
        $documenttype->update();

        return response()->json([
                'status' => 'success',
        ]);

    }

    public function DocumentTypeEnable(Request $request, $id){
        $documenttype = DocumentType::where('id', $id)->first();
        $documenttype->status = 'active';
        $documenttype->update();

        return response()->json([
                'status' => 'success',
        ]);

    }

    public function edit($id){
        $documenttype = DocumentType::where('id', $id)->first();
        return view('backend.documenttype.edit',compact('documenttype'));
    }

    public function update(Request $request, $id){
      $validator = \Validator::make($request->all(),[



          'name' => 'required',
      ],
        [
          'name.required'=> 'Document Type Field Is Required',
       ]);
       if ($validator->fails()) {
               return response()->json(array('error' => $validator->errors()->first()));
       }

       $documenttype = DocumentType::where('id', $id)->first();
       $documenttype->name = $request->input('name');
       $documenttype->update();
       return response()->json(['success'=>'Card Type Edit Successfully.']);
    }

    public function documenttypeDelete($id){

        $cardtype = DocumentType::where('id', $id)->first();

        #check_hospital_child_exist

            $cardtype->delete();

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
