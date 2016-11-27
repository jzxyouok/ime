<?php

namespace App\Model;

use App\Api\Api;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Request;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use Searchable;

    public $dateFormat = "U";
    
    public function addCat() {
        $catInfo = Request::except('_token');
        foreach ($catInfo as $key => $value) {
            $this -> $key = $value;
        }
        return $this -> save();
    }

    /** 修改栏目信息
     * @return mixed 返回修改结果
     */
    public function editCat() {
        $catInfo = Request::except('_token');
        $validateResult = $this -> validatorCatExists($catInfo['id']);
        if (!empty($validateResult)) {
            return $validateResult;
        }
        $category = self::select('cat_name' , 'cat_order' , 'cat_pid' , 'cat_seo_title' , 'cat_seo_keyword' , 'cat_seo_description' , 'cat_url' , 'cat_status' , 'cat_page' , 'cat_page_content')
                    -> find($catInfo['id']);
        foreach ($catInfo as $key => $value) {
            $category -> $key = $value;
        }
        return $category -> save();
    }

    public function delCat() {

        $catInfo = $this -> delFind(9);
        $arr[] = Request::get('id');
        if (!empty($catInfo)) {
            foreach ($catInfo as $value) {
                $arr[] = $value['id'];
            }
        }
//        return self::destroy(Request::get('id'));
        if (empty(self::destroy($arr))) {
            return '';
        }
        return $arr;
    }

    public function delFind($catId) {

        $catInfo = self::select('id','cat_pid' , 'cat_name')
            ->get()
            ->toArray();
        return $this -> orderCat($catInfo , $catId);
    }

    /** 通过栏目 ID 查询栏目信息
     * @param $catId 需要查询的栏目 ID
     * @return mixed 栏目信息
     */
    public function findCat($catId) {
        $validateResult = $this -> validatorCatExists($catId);
        if (!empty($validateResult)) {
            return $validateResult;
        }
        $catInfo = self::select("*")
                -> where('id' , '=' , $catId)
                -> first();
        return $catInfo;
    }
    /**              简略查询、处理栏目信息并返回栏目信息
     * @return array 栏目信息数组
     */
    public function simpleFind() {
        $catInfo = self::join('categories_status' , 'categories.cat_status' , '=' , 'categories_status.id')
            ->select('categories.id as id','cat_name','cat_order','cat_pid','cat_url','cat_status' ,'cat_page' , 'categories_status.id as cat_status' , 'cat_status_name')
            ->orderBy('cat_order' , 'desc')
            ->orderBy('id','asc')
            ->get()
            ->toArray();
        return $this -> orderCat($catInfo);
    }


    public function selectMenu() {
        $catInfo = self::select('id','cat_name','cat_pid','cat_seo_title','cat_seo_keyword','cat_seo_description','cat_url')
            ->orderBy('cat_order' , 'asc')
            ->orderBy('id','desc')
            ->get()
            ->toArray();
//        dd($catInfo);
        return $this -> orderCatMenu($catInfo);
    }

    /**编辑栏目状态 ： 隐藏 / 显示
     * @return mixed 返回编辑栏目成功/失败结果
     */
    public function editStatus() {
        $id = Request::get('id');

        $validateResult = $this -> validatorCatExists($id);
        if (!empty($validateResult)) {
            return $validateResult;
        }

        $catInfo = self::select('id','cat_status')
            ->  where('id' , '=' , $id)
            -> first();
        if ($catInfo -> cat_status == 0) $catInfo -> cat_status = 1;
        else $catInfo -> cat_status = 0;
        return $catInfo -> save();
    }
    /**        添加栏目自动验证
     * @return mixed 验证通过不返回任何元素，验证不通过，通过 Api 返回状态码及消息提示
     */
    public function autoValidator() {
        $CatApi = new Api();
        $validator = Validator::make(Request::except('_token') , [
            'cat_name'      =>  'required',
            'cat_pid'       =>  'required'
        ] , [
            'cat_name.required'     =>  '栏目名称不能为空',
            'cat_pid.required'      =>  '父级栏目ID不能为空',
        ]);
        if ($validator -> fails()) {
            $CatApi -> Message = $validator -> errors() -> first();
            return $CatApi -> AjaxReturn();
        }
        $validator = Validator::make(Request::except('_token') , [
            'cat_url'       =>  'active_url',
            'cat_name'      =>  'unique:categories,cat_name',
        ] , [
            'cat_url.active_url'    =>  '链接格式不正确',
            'cat_name.unique'       =>  '栏目已存在',
        ]);
        if ($validator -> fails()) {
            $CatApi -> Message = $validator -> errors() -> first();
            return $CatApi -> AjaxReturn();
        }
    }

    /**验证 Id ， 判断栏目是否存在
     * @return mixed 返回验证结果
     */
    public function validatorCatExists ($catId) {
        $CatApi = new Api();
        $validateResult = self::find($catId);
        if (empty($validateResult)) {
            $CatApi -> Message = "栏目不存在";
            return $CatApi -> AjaxReturn();
        }
    }

    /**       递归无限极处理栏目
     * @param $catInfo 原栏目数组
     * @param int $pid 栏目父级 id
     * @param int $level 栏目缩进量
     * @return array 返回处理过后的栏目数组
     */
    public function orderCat($catInfo , $pid = 0 , $level = 0) {
        static $catArr = array();
        static $icon = "┣━━━";
        foreach ($catInfo as $value) {
            if ($value['cat_pid'] == $pid) {
                $value['level'] = $level + 1;
                $value['cat_title'] = str_repeat($icon , $value['level']).$value['cat_name'];
                $catArr[] = $value;
                $this->orderCat($catInfo , $value['id'] , $level + 1);
            }
        }
        return $catArr;
    }

    public function orderCatMenu($catInfo) {

        $catArr = array();
        foreach ($catInfo as $value) {

            $catArr[$value['id']] = $value;
        }
        foreach ($catArr as $value) {

            foreach ($catArr as $val) {
                if ($value['id'] == $val['cat_pid']) {

                    $catArr[$val['cat_pid']]['child'][] = $val;
                }
            }
        }
        $category = array();
        foreach ($catArr as $value) {
            if ($value['cat_pid'] == 0) {
                $category[$value['id']] = $value;
            }
        }
        $category = array_sort_recursive($category);
        
        return $category;
    }
}
