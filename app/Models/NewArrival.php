<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewArrival extends Model
{
    protected $table ="newarrivals";
    protected $primaryKey ="id";
    protected $fillable = ['image','name'];

    
    public function saveNewArrival($request){
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
    public function updateNewArrival($request,$id){
        if ($request->hasFile('image')){ 
            if($request->file('image')->isValid()){
               $file = $request->file('image');
                $name = rand(11111,99999).'.'.$file->getClientOriginalExtension();
                $request->file('image')->move("upload",$name);
           }
        } 
    
        $newarrival = self::find($id);
        $data = [
           'image' =>url('/').'/upload/'. $name,
            'name' => $request->get('name'),          
             
        ];
        if($newarrival->update($data))
        {
            return true;
        }	
        return false;
    }
}
