<?php
class UploadController extends BaseController
{
 public function index()
    {
       
        if (Auth::check()) {
        
        return View::make('upload');
    	}

    	else {
    		return Redirect::to('/#error')->with('error', 'Please Login/ Signup to upload');
    	}
    }



   public function actionUpload()
   {

   		$input = Input::all();
   		
   }


}
	