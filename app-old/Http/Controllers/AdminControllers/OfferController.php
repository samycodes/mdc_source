<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Objects\Offers;

class OfferController extends Controller
{
    public function index(){
        try {

            $offers = Offers::orderBy('id','desc')->get();

            return view('backend.offers.index', compact('offers'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error' , $e->getMessage());
        }
    }
    
    public function add(){
        return view('backend.offers.add');
    }
    
    public function save(Request $request){
        
        $validator = \Validator::make($request->all(),[
                'title' => 'required',
                'description' => 'required|max:120',
                'image' => 'required|max:1000',
            ],[
                'title.required' => 'The offer title field is required !',
                'description.required' => 'The offer description title field is required !',
                'image.required' => 'The offer image field is required !',
                
                ]);

            if ($validator->fails()) {
                
                return response()->json(array('error' => $validator->errors()->first()));
            }

            if(!$request->hasFile('image')) {
                return redirect()->back()->with('error','upload_file_not_found');
            }

           
            $file = $request->file('image');
            $baseurl ='http://128.199.31.19/mdc/';
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/images/", $name);
            $filePath = $baseurl."/public/images/" . $name;
           
            
            $offer= new Offers();
            $offer->title = $request->input('title');
            $offer->description = $request->input('description');
            $offer->image = $filePath;
            $offer->save();
            
            return response()->json(['success'=>'New Offer Added Successfully !']);

    }
    
    public function edit($id){
        $offer = Offers::where('id', $id)->first();
        return view('backend.offers.edit',compact('offer'));
    }
    
    public function update(Request $request, $id){
        $validator = \Validator::make($request->all(),[
                'title' => 'required',
                'description' => 'required|max:120',
            ],[
                'title.required' => 'The offer title field is required !',
                'description.required' => 'The offer description title field is required !',
                
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


}
