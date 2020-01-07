<?php
/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
*/
namespace App\Http\Controllers\Web;
//use Mail;
//validator is builtin class in laravel
use Validator;

use DB;
//for password encryption or hash protected
use Hash;

//for authenitcate login data
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

//for requesting a value 
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

//for Carbon a value 
use Carbon;
use Lang;
//email
use Illuminate\Support\Facades\Mail;
use Session;

class WebSettingController extends DataController
{
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 //contactUs
	public function changeLanguage(Request $request){
		if($request->ajax()){
		   $request->session()->put('locale', $request->locale);
		   		   
		   //set language
		   $languages = DB::table('languages')->where('code','=',$request->locale)->get();	  
		   $request->session()->put('direction', $languages[0]->direction);		   
		   $request->session()->put('language_id', $languages[0]->languages_id);
		}
		
	}
	
	
}
