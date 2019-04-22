<?php
namespace app\week\controller;


use think\Controller;
use app\week\model\WeekUser;

class User extends Controller
{

    public function index(){
        return view();
    }

    /**
     * ajax返回数据
     */
    public function ajaxlist(){
        if (request()->isAjax()){
            //接参数
            $p = input('p');
            if (!$p){
                $p = 1;
            }
            $objUser = new WeekUser();
            $list = $objUser->getList($p);
            echo json_encode(['status'=>1,'msg'=>'','data'=>$list]);
            exit;
        } else {
            echo json_encode(['status'=>4001,'msg'=>'异常请求','data'=>[]]);
            exit;
        }
    }

    /**
     * 单删 批删
     */
    public function ajaxdel(){
        if (request()->isAjax()){
            $id = input('id/a');
            WeekUser::destroy($id);
            echo json_encode(['status'=>1,'msg'=>'','data'=>[]]);
            exit;
        } else {
            echo json_encode(['status'=>4001,'msg'=>'异常请求','data'=>[]]);
            exit;
        }
    }
}