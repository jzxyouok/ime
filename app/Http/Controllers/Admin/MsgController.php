<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MsgController extends Controller
{
    public function index () {
         
        $title = '留言管理';
        return view('admin.msg' , compact('title'));
    }
}
