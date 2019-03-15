<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table ="books";
    protected $primaryKey ="id";
    protected $fillable = ['image','name'];

    public function saveBook($request){
        if ($request->hasFile('image')){ 
            if($request->file('image')->isValid()){
                $file = $request->file('image');
                $name = rand(11111,99999).'.'.$file->getClientOriginalExtension();
                $request->file('image')->move("upload",$name);
           }
        } 
        $data = [
            'image' =>url('/').'/upload/'. $name,
            'name' => $request->get('name'),
                    
        ];
        //dd($data);
        return self::create($data);
    }
    public function updateBook($request,$id){
        if ($request->hasFile('image')){ 
            if($request->file('image')->isValid()){
               $file = $request->file('image');
                $name = rand(11111,99999).'.'.$file->getClientOriginalExtension();
                $request->file('image')->move("upload",$name);
           }
        } 
    
        $book = self::find($id);
        $data = [
           'image' =>url('/').'/upload/'. $name,
            'name' => $request->get('name'),          
             
        ];
        if($book->update($data))
        {
            return true;
        }	
        return false;
    }
}
