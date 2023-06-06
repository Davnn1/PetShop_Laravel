<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;

class ControllerUser extends Controller
{
    public function index(Request $req){
		if($req->session()->has('user')){
			if(isset($_GET['keyword'])){
				$keyword = $req->keyword;
				$dtusr 	 = DB::table('login')
									->where('username', 'like', '%'.$keyword.'%')
									->orWhere('email', 'like', '%'.$keyword.'%')
									->orWhere('level', 'like', '%'.$keyword.'%')
                                    ->orWhere('created', 'like', '%'.$keyword.'%')
									->get();
			}
			else{
				$dtusr 	 = DB::table('login')->orderby('created', 'asc')->get();
			}
			return view('readDatauser', compact('dtusr'));
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
	
	public function update(Request $req, $username){
		if($req->session()->has('user')){
			$dtusr = DB::table('login')->where('username', $username)->first();
            return view('updateUser', compact('dtusr'));
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
	
	public function process_update(Request $req){
		if($req->session()->has('user')){
			$user 		= $req->username;
			$pass 		= $req->password;
			$mail 	    = $req->email;
			$level      = $req->level;
			$created	= $req->created;
			try{
				if(empty($req->password) && empty($mail)){
					DB::table('login')	->where('username', $user)
										->update(['level' => $level]);
					Session::flash('success', 'Berhasil Update Level User!');
					return redirect()->action('App\Http\Controllers\ControllerUser@index');
				}
				elseif(empty($pass)){
					DB::table('login')	->where('username', $user)
										->update(['email'  => $mail, 
										'level'	=>$level]);
					Session::flash('success', 'Berhasil Update Email & Level User!');
					return redirect()->action('App\Http\Controllers\ControllerUser@index');

				}
				elseif(empty($mail)){
					DB::table('login')	->where('username', $user)
										->update(['password'  => md5($pass), 
										'level'	=>$level]);
					Session::flash('success', 'Berhasil Update Password & Level User!');
					return redirect()->action('App\Http\Controllers\ControllerUser@index');					
				}
                else{
                    DB::table('login')    ->where('username', $user)
                                        ->update(['password'  => md5($pass),'email'  => $mail, 
                                        'level'    =>$level]);
                    Session::flash('success', 'Berhasil Update E-mail, Password & Level User!');
                    return redirect()->action('App\Http\Controllers\ControllerUser@index');
                }
            }
            catch(QueryException $ex){
                Session::flash('failed', 'Gagal update data ke dalam database');
            }
			return redirect()->action('App\Http\Controllers\ControllerBarang@index');
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}	
    }
	
	public function delete(Request $req, $username){
		if($req->session()->has('user')){
			try{				
				DB::table('login')->where('username', $username)
								   ->delete();		
				Session::flash('success', 'Berhasil Delete Data Barang');
				return redirect()->action('App\Http\Controllers\ControllerUser@index');
			}
			catch(QueryException $ex){
				Session::flash('failed', 'Gagal delete data');
			}
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
}