<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Jobs\UpdateIndexCache;
use App\Model\Article;
use App\Model\Category;
use App\Model\Upload;
use Session;
use Request;

class ArticleController extends Controller
{
    public function articleList () {

        $article = new Article();
        $artList = $article->selectArt();
        $title = '文章管理';
        return view('admin.articleList' , compact('title'))
            -> with('article' , $artList)
            -> with('user' , Session::get('userInfo'));
    }

    public function dustbin() {
        $article = new Article();
        $artInfo = $article -> selectDustbin();
        $title = '垃圾箱';
        return view('admin.dustbin' , compact('title'))
            -> with('article' , $artInfo)
            -> with('user' , Session::get('userInfo'));
    }

    public function addArticle () {
        $title = '添加文章';
        $category = new Category();
        $catInfo = $category -> simpleFind();
        return view('admin.addArticle' , compact('title'))
            -> with('cat' , $catInfo)
            -> with('user' , Session::get('userInfo'));
    }

    public function editArt($artId) {
        $title = '编辑文章';
        $article = new Article();

        if (!$article -> validatorArtExists($artId)) {
            abort('404');
        }

        $category = new Category();
        $catInfo = $category -> simpleFind();
        $artInfo = $article -> findArt($artId);
        return view('admin.editArt' , compact('title')) 
            -> with('article' , $artInfo) 
            -> with('cat' , $catInfo)
            -> with('user' , Session::get('userInfo'));
    }

    public function toUpdateArt() {

        $Api = new Api();
        $article = new Article();

        if (!$article -> validatorArtExists(Request::get('id'))) {
            $Api -> Message = '文章不存在';
            return $Api -> AjaxReturn();
        }

        $art = $article -> updateArt();
        if (empty($art)) {
            $Api -> Message = '修改失败';
            return $Api -> AjaxReturn();
        }
        if (Request::get('article_status') == 2) {
            $artInfo = $article -> findArt(Request::get('id'));
            if (!$artInfo -> delete()) {
                $Api -> Message = '移至垃圾箱失败';
            }else{
                $this -> store();
                $Api -> Status = 1;
                $Api -> Message = '移至垃圾箱成功';
            }
        }else if (Request::get('article_status') == 1) {
            $this -> store();
            $Api -> Status = 1;
            $Api -> Message = '保存草稿成功';
        }else{
            $this -> store();
            $Api -> Status = 1;
            $Api -> Message = '修改成功';
        }

        return $Api -> AjaxReturn();
    }

    public function toDustbin() {

        $Api = new Api();
        $artId = Request::get('id');
        $article = new Article();
        if (!$article -> validatorArtExists($artId)) {
            $Api -> Message = '文章不存在';
            return $Api -> AjaxReturn();
        }
        if (!$article -> toDustbin()) {
            $Api -> Message = '移至垃圾箱失败';
        }
        $this -> store();
        $Api -> Status = 1;
        $Api -> Message = '移至垃圾箱成功';
        return $Api -> AjaxReturn();

    }

    public function toDelete() {

        $Api = new Api();
        $artId = Request::get('id');
        $article = new Article();
        if (!$article -> validatorArtExists($artId)) {
            $Api -> Message = '文章不存在';
            return $Api -> AjaxReturn();
        }
        if (!$article -> deleteArt()) {
            $Api -> Message = '删除失败';
        }
        $this -> store();
        $Api -> Status = 1;
        $Api -> Message = '删除成功';
        return $Api -> AjaxReturn();
    }

    public function toRestoreArt() {

        $Api = new Api();
        $artId = Request::get('id');
        $article = new Article();
        if (!$article -> validatorDustbinExists($artId)) {
            $Api -> Message = '垃圾箱中不存在此文章';
            return $Api -> AjaxReturn();
        }
        if (!$article -> restoreArt()) {
            $Api -> Message = '还原失败';
        }
        $this -> store();
        $Api -> Status = 1;
        $Api -> Message = '还原成功';
        return $Api -> AjaxReturn();
    }
    
    public function toDeleteDustbin() {

        $Api = new Api();
        $artId = Request::get('id');
        $article = new Article();
        if (!$article -> validatorDustbinExists($artId)) {
            $Api -> Message = '垃圾箱中不存在此文章';
            return $Api -> AjaxReturn();
        }
        if (!$article -> deleteDustbin()) {
            $Api -> Message = '删除失败';
        }
        $Api -> Status = 1;
        $Api -> Message = '删除成功';
        return $Api -> AjaxReturn();
    }
    
    public function toAddArt() {
//        dd(Request::all());
        $Api = new Api();
        $article = new Article();

        $validatorResult = $article -> validatorArticle();

        if (!empty($validatorResult)) {
            return $validatorResult;
        }

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
            $this -> store();
            $Api -> Status = 1;
            $Api -> Message = '保存草稿成功';
        }else{
            $this -> store();
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

        $upload = new Upload();
        $upload -> field = 'wangEditorH5File';
        $upload -> fileTitle = '';
        $upload -> path = '/upload/article';

        $picInfo = $upload -> upload();
        $picInfo = json_decode($picInfo);

        return $picInfo -> url;
    }

    public function store() {
        dispatch(new UpdateIndexCache());
    }
}
