<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/16
 * Time: 10:29
 */

//缓存判断
session_start();
$user = $_SESSION['user'];
//如果没有登录进入登录页面
if (empty($user)){
    header("location:login.php");
} else {
    //如果已经登录跳转admin页面
    header("location:admin.php");
}


?>

