<?php

namespace App\Http\Controllers;

use App\Models\BestBook;
use Illuminate\Http\Request;

class BestBookController extends ApiBaseController
{
    
    public $bestbook;
    public function __construct(BestBook $bestbook){
        $this->bestbook = $bestbook;
    }
    public function store(Request $request)
    {
        $this->bestbook->saveBestBook($request);
        return $this->sendResponse($this->bestbook->orderBY('created_at','desc')->get(), 'Best book have been add');
        
    }
    public function index()
    {
        return $this->sendResponse($this->bestbook->orderBY('created_at','desc')->get(), 'Best Book Retrieved');
    }
    public function update(Request $request,$id)
    {
        $bestbook = $this->bestbook->updateBestbook($request, $id);
        if($bestbook)
        {
             return $this->sendResponse($this->bestbook->orderBy('created_at','desc')->get(),'Best Book update Successfully');
        } 
  
        return $this->sendError('Best Book hasnot been update');
     
    } 
    public function destroy($id)
    {
        $bestbook = BestBook::findOrFail($id);
        
        if(! $bestbook){
            return response()->json([
                'success'=>false,
                'message'=>'Best Book with id ' .$id. ' not found '
        ]);
        }
        if($bestbook->destroy($id)){
            return response()->json([
                'success'=>true,
                'message'=>'Best Book with id ' .$id. ' successfully deleted'
        ]);
        }
    }

}
