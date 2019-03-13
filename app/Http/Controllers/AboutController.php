<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends ApiBaseController
{ 
    public $about;
    public function __construct(About $about){
        $this->about = $about;
    }

    public function store(Request $request)
    {
        $this->about->saveAbout($request);
        return $this->sendResponse($this->about->orderBY('created_at','desc')->get(), 'About have been add');
        
    }
    public function index()
    {
        return $this->sendResponse($this->about->orderBY('created_at','desc')->get(), 'About Retrieved');
    }
    public function update(Request $request,$id)
    {
        $about = $this->about->updateAbout($request, $id);
        if($about)
        {
             return $this->sendResponse($this->about->orderBy('created_at','desc')->get(),'About update Successfully');
        } 
  
        return $this->sendError('About hasnot been update');
     
    } 
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        
        if(! $about){
            return response()->json([
                'success'=>false,
                'message'=>'About with id ' .$id. ' not found '
        ]);
        }
        if($about->destroy($id)){
            return response()->json([
                'success'=>true,
                'message'=>'Aboutwith id ' .$id. ' successfully deleted'
        ]);
        }
    }
}
