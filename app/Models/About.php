<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table ="abouts";
    protected $primaryKey ="id";
    protected $fillable = ['title','desc'];
    
    public function saveAbout($request){  
        //dd(shweta);    
        $data = [
            'title' => $request->get('title'),
            'desc' => $request->get('desc'),
                        
        ];
        //dd($data);
        return self::create($data);
    }
    public function updateAbout($request,$id){
           
        $about = self::find($id);
        $data = [
            'title' => $request->get('title'),
            'desc' => $request->get('desc'),
             
        ];
        if($about->update($data))
        {
            return true;
        }	
        return false;
    }
}
