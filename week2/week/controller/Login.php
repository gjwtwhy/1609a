<?php
namespace app\week\controller;
use think\Controller;
use app\week\model\WeekAdmin;
class Login extends Controller
{

    public function index(){
        return view();
    }

    /*
     * 登录
     */
    public function login(){
        //判断是否是ajax请求
        if (request()->isAjax()){
            //接参数
            $username = input('username');
            $pwd = input('pwd');
            //参数验证
            if (empty($username)){
                echo json_encode(['status'=>4002,'msg'=>'用户名不能为空','data'=>[]]);
                exit;
            }
            if (empty($pwd)){
                echo json_encode(['status'=>4003,'msg'=>'密码不能为空','data'=>[]]);
                exit;
            }
            //查库
            $objAdmin = new WeekAdmin();
            $list = $objAdmin->where(['username'=>$username, 'pwd'=>md5($pwd)])->find();
            //返回
            if ($list){
                $e = [];
                $e['id'] = $list['id'];
                $e['username'] = $list['username'];
                echo json_encode(['status'=>1,'msg'=>'','data'=>$e]);
                exit;
            } else {
                echo json_encode(['status'=>4004,'msg'=>'用户名或密码错误','data'=>[]]);
                exit;
            }

        } else {
            echo json_encode(['status'=>4001,'msg'=>'','data'=>[]]);
            exit;
        }
    }
}