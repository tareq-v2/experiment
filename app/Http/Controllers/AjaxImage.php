<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxImage extends Controller
{
    public function index(){
        return view('ajaxImage');
    }
}
