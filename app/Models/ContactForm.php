<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $table ="contactforms";
    protected $primaryKey ="id";
    protected $fillable = ['fullname','email','subject','message'];
    
    public function saveContactForm($request){  
        //dd(shweta);    
        $data = [
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),                   
        ];
        //dd($data);
        return self::create($data);
    }
    public function updateContactFrom($request,$id){
           
        $contactform = self::find($id);
        $data = [
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),  
        ];
        if($contactform->update($data))
        {
            return true;
        }	
        return false;
    }
}

