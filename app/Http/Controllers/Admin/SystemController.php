<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function index () {
        $title = '仪盘';
        return view('admin.system' , compact('title'));
    }
}
