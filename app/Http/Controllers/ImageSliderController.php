<?php

namespace App\Http\Controllers;

use App\Models\ImageSlider;
use Illuminate\Http\Request;

class ImageSliderController extends ApiBaseController
{
    public $imageslider;
    public function __construct(ImageSlider $imageslider){
        $this->imageslider = $imageslider;
    }
    public function store(Request $request)
    {
        $this->imageslider->saveImageSlider($request);
        return $this->sendResponse($this->imageslider->orderBY('created_at','desc')->get(), 'Image Slider have been add');
        
    }
    public function index()
    {
        return $this->sendResponse($this->imageslider->orderBY('created_at','desc')->get(), 'Image Slider Retrieved');
    }
    public function update(Request $request,$id)
    {
        $imageslider = $this->imageslider->updateImageSlider($request, $id);
        if($imageslider)
        {
             return $this->sendResponse($this->imageslider->orderBy('created_at','desc')->get(),'Image slider update Successfully');
        } 
  
        return $this->sendError('Image slider hasnot been update');
     
    } 
    public function destroy($id)
    {
        $imageslider = ImageSlider::findOrFail($id);
        
        if(! $imageslider){
            return response()->json([
                'success'=>false,
                'message'=>'Image Slider with id ' .$id. ' not found '
        ]);
        }
        if($imageslider->destroy($id)){
            return response()->json([
                'success'=>true,
                'message'=>'Image Slider with id ' .$id. ' successfully deleted'
        ]);
        }
    }

}
