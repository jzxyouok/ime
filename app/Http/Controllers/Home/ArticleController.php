<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;

class ArticleController extends Controller
{
    public function index($artId) {
        
        return view('home.article');
    }
}
