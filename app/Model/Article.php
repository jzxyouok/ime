<?php

namespace App\Model;

use App\Api\Api;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use Validator;
use Request;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $dateFormat = "U";
    protected $guarded = [];

    public function updateArt() {
        $artInfo = Request::except('_token');
        $article = $this -> findArt($artInfo['id']);
        foreach ($artInfo as $key => $value) {
            $article -> $key = $value;
        }
        return $article -> save();
    }

    public function toDustbin() {
        
        $artId = Request::get('id');
        $artInfo = self::find($artId);
        return $artInfo -> delete();
    }
    
    public function deleteArt() {

        $artId = Request::get('id');
        $article = self::find($artId);
        return $article -> forceDelete();
    }

    public function deleteDustbin() {
        $artId = Request::get('id');
        $article = self::onlyTrashed() -> find($artId);
        return $article -> forceDelete();
    }

    public function restoreArt() {

        $artId = Request::get('id');
        $article = self::onlyTrashed() -> find($artId);
        $article -> article_status = 1;
        if ($article -> save()) {

            return $article -> restore();
        }else{
            return false;
        }
    }
    
    public function findCountArticle() {
        
        return self::count();
    }
    
    public function selectArticle($offset) {

        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.article_title' ,'categories.cat_name' , 'articles.thumb' , 'articles.content' , 'articles.seo_title' , 'articles.seo_keyword' , 'articles.seo_description' , 'users.name as author' , 'articles.updated_at')
            ->orderBy('id','desc')
            ->take(10)
            ->skip($offset)
            ->get();
    }

    public function selectCatArticle($offset , $CatId) {

        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.article_title' ,'categories.cat_name' , 'articles.thumb' , 'articles.content' , 'articles.seo_title' , 'articles.seo_keyword' , 'articles.seo_description' , 'users.name as author' , 'articles.updated_at')
            ->where('cat_id' , '=' , $CatId)
            ->orderBy('id','desc')
            ->take(10)
            ->skip($offset)
            ->get();
    }

    public function selectArt() {
        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.article_title' ,'categories.cat_name' , 'articles.article_status' ,'articles_status.article_status_name' , 'users.name as author' , 'articles.updated_at')
            ->paginate(10);
    }
    
    public function findArt($artId) {
        
        return self::find($artId);
    }

    public function selectDustbin() {
        return self::onlyTrashed()
            ->join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->select('articles.id' , 'articles.article_title' ,'categories.cat_name' , 'users.name as author' , 'articles.deleted_at')
            ->paginate(10);
    }

    public function saveArt() {
//        foreach (Request::except('_token') as $key => $value) {
//            $this -> $key = $value;
//        }
//
//        $userInfo = Session::get('userInfo');
//        $this -> author =   $userInfo['id'];
//        return $this -> save();
        $artInfo = Request::except('_token');
        $userInfo = Session::get('userInfo');
        $artInfo['author'] = $userInfo['id'];

        return self::create($artInfo);

    }

    public function validatorArticle() {

        $Api = new Api();
        $validator = Validator::make(Request::except('_token') , [
            'article_title'     =>  'required',
            'content'           =>  'required',
            'cat_id'            =>  'required'
        ] , [
            'article_title.required'    =>  '文章标题不能为空',
            'content.required'          =>  '文章内容不能为空',
            'cat_id.required'           =>  '文章栏目不能为空'
        ]);
        
        if ($validator -> fails()) {
            $Api -> Message = $validator -> errors() -> first();
            return $Api -> AjaxReturn();
        }
        
        $validator = Validator::make(Request::except('_token') , [
            'article_title'     =>  'unique:articles,article_title',
            'cat_id'            =>  'exists:categories,id'
        ] ,[
            'article_title.unique'  =>   '文章已存在',
            'cat_id.exists'         =>   '栏目不存在'    
        ]);
        
        if ($validator -> fails()) {
            $Api -> Message = $validator -> errors() -> first();
            return $Api -> AjaxReturn();
        }
    }
    
    public function validatorArtExists($artId) {
        $artInfo = self::where('id' , $artId) -> count();
        if (empty($artInfo)) {
            return false;
        }else{
            return true;
        }
    }

    public function validatorDustbinExists($artId) {

        $artInfo = self::onlyTrashed() -> where('id' , $artId) -> count();
        if (empty($artInfo)) {
            return false;
        }else{
            return true;
        }
    }

}
