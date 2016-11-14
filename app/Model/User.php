<?php

    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;
    use Request;
    use Validator;
    use App\Api\Api;

class User extends Model
{
    public $dateFormat = "U";

    public function findUser() {
        $userInfo = self::where("name" ,Request::get('name') )
                    -> first();
        return $userInfo;
    }

    public function autoValidator() {
        $loginApi = new Api();
        $validator = Validator::make(Request::except('_token') , [
            'name'      =>      'required',
            'password'  =>      'required'
        ],[
            'name.required'     =>  '用户名不能为空',
            'password.required' =>  '密码不能为空'
        ]);
        if ($validator -> fails()) {
            $loginApi -> Message = $validator -> errors() -> first();
            return $loginApi -> AjaxReturn();
        }
        $validator = Validator::make(Request::except('_token'), [
            'name'              =>      'alpha_num|between:4,20|exists:users,name'
        ],[
            'name.alpha_num'    =>      '用户名中不能包含特殊字符',
            'name.between'      =>      '用户名长度应介于 4 - 20 之间',
            'name.exists'       =>      '用户名或密码错误'
        ]);
        if ($validator -> fails()) {
            $loginApi -> Message = $validator -> errors() -> first();
            return $loginApi -> AjaxReturn();
        }
    }
}
