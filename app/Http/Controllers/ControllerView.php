<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;

class ControllerView extends Controller
{
    public function index(){
		$dtmhs = DB::table('barang')->orderby('kategori', 'asc')->get();
		return view('Shopnow', compact('dtmhs'));
	}
}
