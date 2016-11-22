<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Home\IndexController@index');

Route::group(['prefix' => 'admin' , 'middleware' => 'login'], function () {
    Route::get('profile' , 'Admin\ProfileController@index');
    Route::post('profile/uploadThumb' , 'Admin\ProfileController@uploadThumb');
    Route::get('editPwd' , 'Admin\ProfileController@editPwd');
    Route::get('system' , 'Admin\SystemController@index');
    Route::get('addArt' , 'Admin\ArticleController@addArticle');
    Route::get('art' , 'Admin\ArticleController@articleList');
    Route::get('editArt/{artId}' , 'Admin\ArticleController@editArt');
    Route::get('dustbin' , 'Admin\ArticleController@dustbin');
    Route::get('toDustbin' , 'Admin\ArticleController@toDustbin');
    Route::get('toDeleteArt' , 'Admin\ArticleController@toDelete');
    Route::get('toDeleteDustbin' , 'Admin\ArticleController@toDeleteDustbin');
    Route::post('toAddArt' , 'Admin\ArticleController@toAddArt');
    Route::post('toUpdateArt' , 'Admin\ArticleController@toUpdateArt');
    Route::get('toRestoreArt' , 'Admin\ArticleController@toRestoreArt');
    Route::post('uploadPic' , 'Admin\ArticleController@uploadBanner');
    Route::post('uploadArticlePic' , 'Admin\ArticleController@uploadPic');
    Route::get('cat' , 'Admin\CatController@catList');
    Route::get('addCat/{catPid?}' , 'Admin\CatController@addCat');
    Route::get('editCat/{catId}', 'Admin\CatController@editCat');
    Route::post('addCatOperate' , 'Admin\CatController@addCatOperate');
    Route::post('editCatOperate' , 'Admin\CatController@editCatOperate');
    Route::get('editCatStatus' , 'Admin\CatController@editStatus');
    Route::get('delCat' , 'Admin\CatController@delCat');
    Route::get('comment' , 'Admin\CommentController@index');
    Route::get('msg' , 'Admin\MsgController@index');
    Route::get('link' , 'Admin\LinkController@index');
    Route::get('addLink' , 'Admin\LinkController@addLink');
    Route::post('toAddLink' , 'Admin\LinkController@toAddLink');
    Route::get('editLink/{linkId}' , 'Admin\LinkController@editLink');
    Route::post('toEditLink' , 'Admin\LinkController@toEditLink');
    Route::get('delLink' , 'Admin\LinkController@delLink');
    Route::get('setting' , 'Admin\SetController@index');
});

Route::post('checkLogin' , 'Admin\LoginController@checkLogin');
Route::get('login' , 'Admin\LoginController@index');
Route::get('loginOut' , 'Admin\LoginController@loginOut');
Route::get('lock' , 'Admin\LoginController@lock');
Route::get('loginLock' , 'Admin\LoginController@loginLock');
Route::post('toLock' , 'Admin\LoginController@toLock');

Route::get('redis' , 'Admin\RedisController@index');

//Route::get('test' , function () {
//    echo config('site.web_url');
//});

Route::get('test' , function () {
    dd(\Illuminate\Support\Facades\Artisan::call('key:generate'));
});