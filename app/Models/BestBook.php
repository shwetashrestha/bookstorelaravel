<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BestBook extends Model
{
    protected $table ="bestbooks";
    protected $primaryKey ="id";
    protected $fillable = ['image','name'];

    
    public function saveBestBook($request){
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
    public function updateBestBook($request,$id){
        if ($request->hasFile('image')){ 
            if($request->file('image')->isValid()){
               $file = $request->file('image');
                $name = rand(11111,99999).'.'.$file->getClientOriginalExtension();
                $request->file('image')->move("upload",$name);
           }
        } 
    
        $bestbook = self::find($id);
        $data = [
           'image' =>url('/').'/upload/'. $name,
            'name' => $request->get('name'),          
             
        ];
        if($bestbook->update($data))
        {
            return true;
        }	
        return false;
    }
}
