<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Response;
use Illuminate\Support\Facades\Storage;
use Request;

class ArticleController extends Controller
{
    public function articleList () {

        $title = '文章管理';
        return view('admin.articleList' , compact('title'));
    }
    public function addArticle () {
        $title = '添加文章';
        $category = new Category();
        $catInfo = $category -> simpleFind();
        return view('admin.addArticle' , compact('title'))->with('cat' , $catInfo);
    }
    public function uploadBanner() {
        $file = Request::file('banner');
        $filePath = '/upload/article/';
        $fileName =rand(1,100).date("YmdHi").'.'.$file->getClientOriginalExtension();

        $file->move(base_path().'/public'.$filePath , $fileName);
//
//        dd(base_path().'/public'.$filePath.$fileName);
//        $uploadPath=$filePath.$fileName;
//        return $filePath.$fileName;
        return Response::json([
            ' initialPreview'  =>  '<img src="'.$filePath.$fileName.'" />'
        ]);
    }
}
