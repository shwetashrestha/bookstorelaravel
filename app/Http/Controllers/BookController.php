<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends ApiBaseController
{
     public $book;
    public function __construct(Book $book){
        $this->book = $book;
    }
    public function store(Request $request)
    {
        $this->book->saveBook($request);
        return $this->sendResponse($this->book->orderBY('created_at','desc')->get(), 'Book have been add');
        
    }
    public function index()
    {
        return $this->sendResponse($this->book->orderBY('created_at','desc')->get(), 'Book Retrieved');
    }
    public function update(Request $request,$id)
    {
        $book = $this->book->updateBook($request, $id);
        if($book)
        {
             return $this->sendResponse($this->book->orderBy('created_at','desc')->get(),'Book update Successfully');
        } 
  
        return $this->sendError('Book hasnot been update');
     
    } 
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        
        if(! $book){
            return response()->json([
                'success'=>false,
                'message'=>'Book with id ' .$id. ' not found '
        ]);
        }
        if($book->destroy($id)){
            return response()->json([
                'success'=>true,
                'message'=>'Book with id ' .$id. ' successfully deleted'
        ]);
        }
    }
}
