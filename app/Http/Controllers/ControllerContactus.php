<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerContactus extends Controller
{
	public function index() {
		$university = "Universitas Bunda Mulia";
		$loc = "Jl. Jalur Sutera Barat No.3, RT.003/RW.006,
		Panunggangan Tim., Kec. Pinang, Kota Tangerang, Banten 15325";
		
		return view('contactus', compact('university', 'loc'));
	}
}