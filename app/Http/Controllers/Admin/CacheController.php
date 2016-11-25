<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Session;
use Request;

class CacheController extends Controller
{
    public function index() {

        $title = '更新缓存';

        $category = new Category();
        $catInfo = $category -> simpleFind();
        
        return view('admin.cache' , compact('title'))
            -> with('cat' , $catInfo)
            -> with('user' , Session::get('userInfo'));
    }
}
