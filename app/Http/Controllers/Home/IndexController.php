<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index() {
		return view('home.index');
	}
}
