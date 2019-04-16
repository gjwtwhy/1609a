<?php
/**
 * 登录页的视图文件
 * User: guoju
 * Date: 2019/4/16
 * Time: 10:34
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<center>
    <form action="do.php?a=login" method="post" id="loginform">
<table>
    <tr>
        <td colspan="2" style="text-align: center">登录</td>
    </tr>
    <tr>
        <td>手机号：</td>
        <td><input type="text" name="mobile" id="mobile"></td>
    </tr>
    <tr>
        <td>密码：</td>
        <td><input type="password" name="pwd" id="pwd"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" value="提交" onclick="loginform();"></td>
    </tr>
</table>
    </form>
    </center>
<script>
    function loginform(){
        var m = $("#mobile").val();
        var p = $("#pwd").val();
        if (m==''){
            alert("手机号不能未空");
            return false;
        }
        var reg = /^1[3|4|5|7|8][0-9]{9}$/;
        if (!reg.test(m)){
            alert('手机号格式不正确');
            return false;
        }
        if(p==''){
            alert("密码不能为空");
            return false;
        }

        $("#loginform").submit();
    }
</script>
</body>
</html>
