<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerFormsewa extends Controller
{
    public function index() {
        return view('formsewa');
    }
}