<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;
use app\admin\model\RedUser;

class Login extends Controller
{

    public function index(){
        return view('index');
    }

    public function login(){
        //接参数
        $username = input('username');
        $pwd = input('pwd');
        //参数验证
        if (empty($username)){
            $this->error('用户名不能为空');
        }
        if (empty($pwd)){
            $this->error('密码不能为空');
        }

        //数据库查询
        $objUser = new RedUser();
        $list = $objUser->login($username,$pwd);
        if ($list){
            //登录成功
            $user = [];
            $user['id'] = $list['id'];
            $user['username'] = $list['username'];
            //存储session
            Session::set('user',$user);
            //跳转
            $this->success('登录成功','index/index');
        }else{
            //登录失败
            $this->error('用户名或密码错误');
        }

    }
}