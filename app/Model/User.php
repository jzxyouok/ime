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

    public function findUserById($userId) {

        $userInfo = self::find($userId);
        return $userInfo;
    }

    public function updateUser() {
        $user = Request::except('_token');
        $userInfo = self::find($user['id']);
        foreach ($user as $key => $value) {
            $userInfo -> $key = $value;
        }
        return $userInfo -> save();
    }

    public function updateValidator() {

        $loginApi = new Api();
        $validator = Validator::make(Request::except('_token'), [
            'id'              =>      'numeric|exists:users,id',
            'pen_name'          =>      'between:4,20|unique:users,pen_name',
            'thumb'             =>      'exists:uploads,file_url',
            'email'             =>      'email',
            'github'            =>      'url'
        ],[
            'id.numeric'    =>      '用户 id 格式错误',
            'id.exists'    =>      '用户不存在',
            'pen_name.between'      =>      '笔名长度应介于 4 - 20 之间',
            'pen_name.unique'      =>      '笔名已存在',
            'thumb.image'       =>      '缩略图不存在',
            'email.image'       =>      'Email 格式错误',
            'github.url'       =>      'github 格式错误'
        ]);
        if ($validator -> fails()) {
            $loginApi -> Message = $validator -> errors() -> first();
            return $loginApi -> AjaxReturn();
        }
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
