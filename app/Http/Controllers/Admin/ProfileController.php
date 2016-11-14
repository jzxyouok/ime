<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index () {

        $title = '个人资料';
        return view('admin.profile' , compact('title'));
    }

    public function editPwd () {

        $title = '修改密码';
        return view('admin.editPwd' , compact('title'));
    }
}
