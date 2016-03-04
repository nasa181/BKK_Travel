<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class web_controller extends Controller
{
    //
    function start_page(){
        return view('welcome');
    }
    function page_travel(){
        return view('travel');
    }
}
