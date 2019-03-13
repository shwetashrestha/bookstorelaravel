<?php

namespace App\Http\Controllers;

use App\Model\NewArrival;
use Illuminate\Http\Request;

class NewArrivalController extends ApiBaseController
{
    
    public $newarrival;
    public function __construct(NewArrival $newarrival){
        $this->newarrival = $newarrival;
    }
    public function store(Request $request)
    {
        $this->newarrival->saveNewArrival($request);
        return $this->sendResponse($this->newarrival->orderBY('created_at','desc')->get(), 'New Arrival have been add');
        
    }
    public function index()
    {
        return $this->sendResponse($this->newarrival->orderBY('created_at','desc')->get(), 'New Arrival Retrieved');
    }
    public function update(Request $request,$id)
    {
        $newarrival = $this->newarrival->updateNewArrival($request, $id);
        if($newarrival)
        {
             return $this->sendResponse($this->newarrival->orderBy('created_at','desc')->get(),'New Arrival update Successfully');
        } 
  
        return $this->sendError('New Arrival hasnot been update');
     
    } 
    public function destroy($id)
    {
        $newarrival = NewArrival::findOrFail($id);
        
        if(! $newarrival){
            return response()->json([
                'success'=>false,
                'message'=>'New Arrival with id ' .$id. ' not found '
        ]);
        }
        if($newarrival->destroy($id)){
            return response()->json([
                'success'=>true,
                'message'=>'New Arrival with id ' .$id. ' successfully deleted'
        ]);
        }
    }

    
}
