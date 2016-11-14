<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SetController extends Controller
{
    public function index () {

        $title = '系统设置';
        return view('admin.setting' , compact('title'));
    }
}
