<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use app\admin\model\RedUser;
use app\admin\model\RedLog;

class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //session：id，username
        $user = Session::get('user');
        //获取用户信息
        $userInfo = RedUser::get($user['id']);
        //获取红包列表
        $redList = RedLog::all();

        return view('index',['user'=>$userInfo,'red'=>$redList]);
    }

    /**
     * 发红包.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * 保存红包记录
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //接收
        $money = input('money');
        $num = input('num');
        //参数验证
        if (empty($money)){
            $this->error('金额不能为空');
        }
        if ($num<1){
            $this->error('至少一份');
        }

        $user = Session::get('user');
        //入库
        $objredLog = new RedLog();
        $result = $objredLog->addRed($user['id'],$money,$num);
        $this->success('发放成功','index/index');
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
