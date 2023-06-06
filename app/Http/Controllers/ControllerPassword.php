<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;

class ControllerPassword extends Controller
{
    public function index(Request $req){
		if($req->session()->has('user')){
			return view('ubahpassword');
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
		
	public function process_change(Request $req){
		if($req->session()->has('user')){
			$user 		= Session::get('user');
			$pass 		= $req->password;
			$confirm 	= $req->confirm;
			
			if($pass==$confirm){
				try{
					DB::table('login')->where('username', $user)
									 ->update(['password' => md5($req->password)]);
				}
				catch(QueryException $ex){
					Session::flash('failed', 'Gagal update data ke dalam database');
				}
				Session::flash('success', 'Berhasil Change Password');
				return redirect()->action('App\Http\Controllers\ControllerLogin@index');
			}
			else{
				Session::flash('failed', 'New dan Confirm Password Tidak Sesuai');
				return redirect()->back()->withInput();
			}
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
}
