<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Session;
use Cookie;

class ControllerLogin extends Controller
{
    public function index(){
		return view('login');
	}
		
	public function process_login(Request $req){
		$user = $req->username;
        $pass = $req->password;
		$rem  = $req->remember;
		
		$login = DB::table('login')->where('username', $user)
								   ->where('password',md5($pass))
								   ->first();

		if($login){
			$dtmhs = DB::table('login')->where('username',$user)
										   ->first();
			session(['user' => $user, 'level' => $login->level]);
			if($rem){
				Cookie::queue('cookieUser', $user, 60*365);
				Cookie::queue('cookiePass', $pass, 60*365);
			}
				return redirect()->action('App\Http\Controllers\ControllerHome2@index');
		}
		else{
			Session::flash('failed', 'Username atau Password Salah');
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');			
		}
	}
	
		public function process_reg(Request $req){
			$user = $req->username;
			$mail = $req->email;
        	$pass = $req->password;

			try{
				DB::table('login')->insert([
							'username'	=>$user,
							'email'		=>$mail,
							'password'	=>md5($pass),
							'level'		=>"Customer",
				]);
				Session::flash('success');
			}
			catch(QueryException $ex){
				Session::flash('failedd');
			}
				return redirect()->action('App\Http\Controllers\ControllerLogin@index');		
	}


	public function process_logout(Request $req){
		Session::flush();
		if(!($req->session()->has('user'))){
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
}