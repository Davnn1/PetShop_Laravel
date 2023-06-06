<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerGrooming extends Controller
{
    public function index() {
        return view('Grooming');
    }
}