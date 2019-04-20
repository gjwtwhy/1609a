<?php

namespace app\admin\model;

use think\Model;

class RedUser extends Model
{
    /**
     * 登录
     * @param $username
     * @param $pwd
     */
    public function login($username,$pwd){
        $list = $this->where(['username'=>$username,'pwd'=>md5($pwd)])->find();
        return $list;
    }
}
