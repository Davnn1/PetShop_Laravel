<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerClinic extends Controller
{
    public function index() {
        return view('Clinic');
    }
}