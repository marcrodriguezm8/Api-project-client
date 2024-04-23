<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    //
    function index(){
        return view('docs');
    }
}
