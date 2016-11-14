<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function articleList () {

        $title = '文章管理';
        return view('admin.articleList' , compact('title'));
    }
    public function addArticle () {
        $title = '添加文章';
        return view('admin.addArticle' , compact('title'));
    }
}
