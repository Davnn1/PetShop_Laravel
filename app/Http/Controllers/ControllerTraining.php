<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTraining extends Controller
{
    public function index() {
        return view('Training');
    }
}