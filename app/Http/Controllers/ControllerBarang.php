<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Session;
use File;

class ControllerBarang extends Controller
{	
	public function index(Request $req){
		if($req->session()->has('user')){
			if(isset($_GET['keyword'])){
				$keyword = $req->keyword;
				$dtmhs 	 = DB::table('barang')
									->where('kd_brg', 'like', '%'.$keyword.'%')
									->orWhere('namabrg', 'like', '%'.$keyword.'%')
									->orWhere('kategori', 'like', '%'.$keyword.'%')
                                    ->orWhere('hrg', 'like', '%'.$keyword.'%')
									->get();
			}
			else{
				$dtmhs 	 = DB::table('barang')->orderby('kd_brg', 'asc')->get();
			}
			return view('readDatabarang', compact('dtmhs'));
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
	
	public function create(Request $req){
		if($req->session()->has('user')){
			return view('buatbarang');
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
	
	public function process_create(Request $req){
		if($req->session()->has('user')){
			try{
				$file 				= $req->file('photo');
				$extension			=['jpeg','jpg','png'];
				$extension_file 	= $file->getClientOriginalExtension();
				$size_file			= $file->getSize();
				$check				= in_array($extension_file,$extension);
				if($check){
					if ($size_file <= 1048576){
						$nama_file 	= $req->kode.".".$file->getClientOriginalExtension();
						DB::table('barang')->insert([
							'kd_brg'	=>$req->kode,
							'foto'		=>$nama_file,
							'namabrg'	=>$req->name,
							'kategori'	=>$req->kategori,
							'hrg'	    =>$req->harga
						]);
						$tujuan_upload 	= 'foto brg';
						$file->move($tujuan_upload,$nama_file);
						Session::flash('success', 'Berhasil Create Data Barang');
					}
					else{
						Session::flash('failed', 'Size file max 1MB');
						return redirect()->back()->withInput();	
					}
				}
				else{
					Session::flash('failed', 'Extension file yang diterima hanya .jpeg, .jpg, dan .png');
					return redirect()->back()->withInput();	
				}
			}
			catch(QueryException $ex){
				Session::flash('failed', $nama_file.' telah ada dalam database');
			}
			return redirect()->action('App\Http\Controllers\ControllerBarang@index');
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
    }
	
	public function update(Request $req, $kode_brg){
		if($req->session()->has('user')){
			$dtmhs = DB::table('barang')->where('kd_brg', $kode_brg)->first();
            return view('updateBarang', compact('dtmhs'));
		}
		else{
			return redirect()->action('App\Http\Controllers\ControllerLogin@index');
		}
	}
	
	public function process_update(Request $req){
		if($req->session()->has('user')){
			$kode 		= $req->kode;
			$name 	    = $req->name;
			$kategori   = $req->kategori;
			$harga		= $req->harga;
			try{
				if(empty($req->file('photo'))) {
					DB::table('barang')	->where('kd_brg', $kode)
											->update([
											'namabrg'	=>$name, 'kategori'  => $kategori, 
											'hrg'	=>$harga]);
					Session::flash('success', 'Berhasil Update Data Barang');
				}
				else{
					$file 				= $req->file('photo');
					$extension			= ['jpeg','jpg','png'];
					$extension_file 	= $file->getClientOriginalExtension();
					$size_file			= $file->getSize();
					$check				= in_array($extension_file,$extension);
					
					if($check){
						if ($size_file <= 1048576){
							$old  		= DB::table('barang')->where('kd_brg', $kode)
															 ->get();
										
							$nama_file 	= $req->kode.".".$file->getClientOriginalExtension();
									
							DB::table('barang')	->where('kd_brg', $kode)
													->update([
													'foto' => $nama_file,	'namabrg' => $name,
													'kategori' => $kategori, 'hrg'   => $harga, ]);
					
							foreach ($old as $o){
								unlink(public_path("foto brg/".$o->foto));
							}
							
							$tujuan_upload 	= 'foto brg';
							$file->move($tujuan_upload,$nama_file);
							
							Session::flash('success', 'Berhasil Update Data Mahasiswa');
						}
						else{
							Session::flash('failed', 'Size file max 1MB');
							return redirect()->back()->withInput();	
						}
					}
					else{
						Session::flash('failed', 'Extension file yang diterima hanya .jpeg, .jpg, dan .png');
						return redirect()->back()->withInput();	
					}
					return redirect()->action('App\Http\Controllers\ControllerBarang@index');
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
	
	public function delete(Request $req, $kd_brg){
		if($req->session()->has('user')){
			try{
				$file = DB::table('barang')->where('kd_brg', $kd_brg)
											  ->get();
				
				DB::table('barang')->where('kd_brg', $kd_brg)
								   ->delete();
				
				foreach ($file as $f){
					unlink(public_path("foto brg/".$f->foto));
				}
				
				Session::flash('success', 'Berhasil Delete Data Barang');
				return redirect()->action('App\Http\Controllers\ControllerBarang@index');
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
