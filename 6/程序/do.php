<?php
/**
 * 处理业务逻辑--控制器
 * User: guoju
 * Date: 2019/4/16
 * Time: 10:45
 */
$a = $_GET['a'];
if ($a=='checkmobile'){
    //验证手机号是否在数据库已存在

}
include 'ElmUser.php';

//登录的处理逻辑
if ($a=='login'){
    //1,接收参数,参数验证
    $data = $_POST;
    if (empty($data['mobile'])){
        echo "mobile is error";
        exit;
    }
    if (empty($data['pwd'])){
        echo "pwd is error";
        exit;
    }

    //2，到数据库查询数据
    $objUser = new ElmUser();
    $list = $objUser->getUserPwd($data['mobile'],$data['pwd']);
    if (!$list){
        echo "login is error";
        exit;
    }
    //登录成功
    session_start();
    $_SESSION['user'] = ['id'=>$list['id'],'mobile'=>$list['mobile']];
    header('location:index.php');
}
//返回数据信息
if ($a=='userlist'){
    //从数据库查询数据
    $objUser = new ElmUser();
    $list = $objUser->getList();
    //json输出
    echo json_encode(['status'=>200,'message'=>'','data'=>$list]);
    exit;
}
?>