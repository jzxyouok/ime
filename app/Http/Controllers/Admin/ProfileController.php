<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Upload;
use Session;

class ProfileController extends Controller
{
    public function index () {

        $title = '个人资料';
        $userInfo = Session::get('userInfo');
        return view('admin.profile' , compact('title')) -> with('user' , $userInfo);
    }

    public function editPwd () {

        $title = '修改密码';
        return view('admin.editPwd' , compact('title'));
    }

    public function uploadThumb() {


        $upload = new Upload();

        $upload -> field = 'uploadThumb';
        $upload -> fileTitle = '';
        $upload -> path = '/upload/user';

        return $upload -> upload();
    }
}
