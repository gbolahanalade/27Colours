<?php
class TalentController extends BaseController

{
   
    public function index()
    {
        
      $musicians = User::where('talents', '=','singing')->confirmed()->take(8)->get();
      $models = User::where('talents', '=','modelling')->confirmed()->take(8)->get();
      $dancers =User::where('talents', '=', 'singing')->confirmed()->take(8)->get(); 
      $comedians=User::where('talents', '=', 'comedy')->confirmed()->take(8)->get();
      $tops =  User::orderBy('id', 'desc')->confirmed()->take(8)->get();
    // $musicians= Song::all()
    // $dancers= Video::where('video_type','=', 'dance')->get();
    // $comedians= Video::where('video_type', '=', 'comedy')->get();
       
        return View::make('profile.talents')
        ->with('musicians',$musicians)
        ->with('models', $models)
        ->with('tops', $tops)
        ->with('dancers', $dancers)
        ->with('comedians',$comedians);
    }
}
  
 
    