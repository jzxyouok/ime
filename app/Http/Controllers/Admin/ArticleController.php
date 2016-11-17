<?php

namespace App\Http\Controllers\Admin;

use App\Expand\UploadController;
use App\Expand\UploadFile;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Upload;
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

        $upload = new Upload();

        $upload -> field = 'banner';
        $upload -> fileTitle = '';
        $upload -> path = '/upload/article';

        return $upload -> upload();

    }
}
