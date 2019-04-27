<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/27
 * Time: 15:44
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<center>
    <form action="do.php" method="post">
<table>
    <tr>
        <td>手机号</td>
        <td><input type="text" name="mobile"></td>
    </tr>
    <tr>
        <td>密码</td>
        <td><input type="password" name="pwd"></td>
    </tr>
    <tr>
        <td>姓名</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>性别</td>
        <td>
            <input type="radio" name="sex" value="1" checked> 男
            <input type="radio" name="sex" value="2"> 女
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="提交">
        </td>
    </tr>
</table>
    </form>
</center>
</body>
</html>
