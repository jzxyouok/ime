<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use Request;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $dateFormat = "U";
    protected $guarded = [];

    function saveDelete() {

    }

    function deleteArt() {

    }

    function selectArt() {
        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.article_title' ,'categories.cat_name' , 'articles.article_status' ,'articles_status.article_status_name' , 'users.name as author' , 'articles.updated_at')
            ->paginate(10);
    }

    function saveArt() {
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
}
