<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerForm extends Controller
{
    public function index() {
        return view('form');
    }
}