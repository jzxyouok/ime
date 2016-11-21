<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Category;
use App\Model\Upload;
use Response;
use Request;

class ArticleController extends Controller
{
    public function articleList () {

        $article = new Article();
        $artList = $article->selectArt();
        $title = '文章管理';
        return view('admin.articleList' , compact('title')) -> with('article' , $artList);
    }
    public function addArticle () {
        $title = '添加文章';
        $category = new Category();
        $catInfo = $category -> simpleFind();
        return view('admin.addArticle' , compact('title'))->with('cat' , $catInfo);
    }

    public function toAddArt() {
//        dd(Request::all());
        $Api = new Api();
        $article = new Article();
        $art = $article -> saveArt();
        if (empty($art)) {
            $Api -> Message = '文章保存失败';
            return $Api -> AjaxReturn();
        }
        if (Request::get('article_status') == 2) {
            if (!$art -> delete()) {
                $Api -> Message = '移至垃圾箱失败';
            }else{
                $Api -> Status = 1;
                $Api -> Message = '移至垃圾箱成功';
            }
        }else if (Request::get('article_status') == 1) {

            $Api -> Status = 1;
            $Api -> Message = '保存草稿成功';
        }else{

            $Api -> Status = 1;
            $Api -> Message = '添加成功';
        }

        return $Api -> AjaxReturn();

    }

    public function uploadBanner() {

        $upload = new Upload();

        $upload -> field = 'banner';
        $upload -> fileTitle = '';
        $upload -> path = '/upload/article';

        return $upload -> upload();

    }

    public function uploadPic() {

//        dd(Request::all(wangEditorH5File));
        $upload = new Upload();
        $upload -> field = 'wangEditorH5File';
        $upload -> fileTitle = '';
        $upload -> path = '/upload/article';

//        $picInfo = $upload -> upload();
        $picInfo = $upload -> upload();
        return $picInfo;
    }
}
