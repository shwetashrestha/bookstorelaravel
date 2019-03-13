<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends ApiBaseController
{
      
    public $contactform;
    public function __construct(ContactForm $contactform){
        $this->contactform = $contactform;
    }

    public function store(Request $request)
    {
        $this->contactform->saveContactForm($request);
        return $this->sendResponse($this->contactform->orderBY('created_at','desc')->get(), 'Contact from have been add');
        
    }
    public function index()
    {
        return $this->sendResponse($this->contactform->orderBY('created_at','desc')->get(), 'Contact Form Retrieved');
    }
    public function update(Request $request,$id)
    {
        $contactform = $this->contactform->updateContactFrom($request, $id);
        if($contactform)
        {
             return $this->sendResponse($this->contactform->orderBy('created_at','desc')->get(),'Contact Form update Successfully');
        } 
  
        return $this->sendError('Contact Formhasnot been update');
     
    } 
    public function destroy($id)
    {
        $contactform = ContactForm::findOrFail($id);
        
        if(! $contactform){
            return response()->json([
                'success'=>false,
                'message'=>'Contact Form with id ' .$id. ' not found '
        ]);
        }
        if($contactform->destroy($id)){
            return response()->json([
                'success'=>true,
                'message'=>'Contact Form with id ' .$id. ' successfully deleted'
        ]);
        }
    }
}
