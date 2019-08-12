<?php
namespace App\Http\Controllers;

use Redirect;
use Auth;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MainController extends BaseController

{
	protected $redirectTo = '/rohs';
	
	public function showLogin()
	{
		return view('login');
	}	

	public function doLogin()
	{
		$rules = array('txt_username' => 'required','txt_password' => 'required|alphaNum');
		$validator = Validator::make(Input::all() , $rules);
		if ($validator->fails())
		{
			return Redirect::to('login')->withErrors($validator) 
			->withInput(Input::except('txt_password')); 
		}
		else
		{
			$key = '$1$uODN7JNv$V7F2FgRCMk8T3GKThEy7a1';
			$password = crypt(Input::get('txt_password'),$key);
			$userdata = array(
				'loginid' => Input::get('txt_username') ,
				'l_password' => $password
			);

			if (Auth::attempt($userdata))
			{	
				return Redirect::to('rohs');
			}
			else
			{
			return Redirect::to('checklogin');
			}
		}
	}

	public function doLogout()
	{
	    Auth::logout(); 
	    return Redirect::to('login');
	}

	
}