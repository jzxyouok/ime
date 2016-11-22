<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;

class LinkController extends Controller
{
    public function index() {
        
        return view('home.link');
    }
}
