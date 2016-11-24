<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Session;
use Request;

class CatController extends Controller
{
    public function catList () {
        $category = new Category();
        $catInfo = $category -> simpleFind();
        $title = '栏目管理';
        return view('admin.category' , compact('title'))
            -> with('catInfo' , $catInfo)
            -> with('user' , Session::get('userInfo'));
    }
    public function addCat ($catPid = 0) {

        $category = new Category();
        $catInfo = $category -> simpleFind();
        $title = '添加栏目';
        return view('admin.addCat' , compact('title'))
            -> with('catInfo' , $catInfo)
            -> with('catPid' , $catPid)
            -> with('user' , Session::get('userInfo'));
    }
    public function editCat ($catId) {
        $category = new Category();
        $validateResult = $category -> validatorCatExists($catId);
        if (!empty($validateResult)) {
//            return $validateResult;
            abort(404);
        }
        $catInfo = $category -> simpleFind($catId);
        $cat = $category -> findCat($catId);
        $title = '编辑栏目';
        return view('admin.editCat' , compact('title'))
            -> with('catInfo' , $catInfo)
            -> with('cat' , $cat)
            -> with('user' , Session::get('userInfo'));
    }
    public function delCat() {
        $CatApi = new Api();
        $category = new Category();
        $validateResult = $category -> validatorCatExists(Request::get('id'));
        if (!empty($validateResult)) {
            return $validateResult;
        }
        $operateResult = $category -> delCat();
        if (empty($operateResult)) {
            $CatApi -> Message = '删除失败';
        }else{
            $CatApi -> Status = 1;
            $CatApi -> Data = $operateResult;
            $CatApi -> Message = '删除成功';
        }
        return $CatApi -> AjaxReturn();
    }
    public function addCatOperate() {
        $CatApi = new Api();
        $category = new Category();
        $catMsg = $category -> autoValidator();
        if (!empty($catMsg)) {
            return $catMsg;
        }
        if (!$category -> addCat()) {
            $CatApi -> Message = "添加失败 ！";
        }else{
            $CatApi -> Status = 1;
            $CatApi ->  Message = "添加成功";
        }
        return $CatApi -> AjaxReturn();
    }
    public function editCatOperate() {
        $CatApi = new Api();
        $category = new Category();
        if (!$category -> editCat()) {
            $CatApi -> Message = '修改失败';
        }else{
            $CatApi -> Status = 1;
            $CatApi -> Message = '修改成功';
        }
        return $CatApi -> AjaxReturn();
    }
    public function editStatus() {
        $CatApi = new Api();
        $category = new Category();
        if (!$category -> editStatus()) {
            $CatApi -> Message = "修改失败";
        }else{
            $CatApi -> Status = 1;
            $CatApi -> Message = "修改成功";
            $CatApi -> Data = $category -> simpleFind();
        }
        return $CatApi -> AjaxReturn();
    }
}
