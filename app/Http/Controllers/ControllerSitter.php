<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerSitter extends Controller
{
    public function index() {
        return view('Sitter');
    }
}