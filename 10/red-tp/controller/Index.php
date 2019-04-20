<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        //获取session
        $user = Session::get('user');
        if (empty($user)){
            //跳转
            $this->redirect('login/index');
        } else {
            $this->redirect('user/index');
        }
    }
}
