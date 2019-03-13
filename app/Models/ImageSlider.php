<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    
    protected $table ="imagesliders";
    protected $primaryKey ="id";
    protected $fillable = ['image','name'];

    
    public function saveImageSlider($request){
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
    public function updateImageSlider($request,$id){
        if ($request->hasFile('image')){ 
            if($request->file('image')->isValid()){
               $file = $request->file('image');
                $name = rand(11111,99999).'.'.$file->getClientOriginalExtension();
                $request->file('image')->move("upload",$name);
           }
        } 
    
        $imageslider = self::find($id);
        $data = [
           'image' =>url('/').'/upload/'. $name,
            'name' => $request->get('name'),          
             
        ];
        if($imageslider->update($data))
        {
            return true;
        }	
        return false;
    }
}