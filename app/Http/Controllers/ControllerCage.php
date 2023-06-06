<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerCage extends Controller
{
    public function index() {
        return view('Cage');
    }
}