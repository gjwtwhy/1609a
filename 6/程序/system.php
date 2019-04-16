<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/16
 * Time: 14:57
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
<table border="1" id="tab">
    <thead>
    <tr>
        <td>系统管理</td>
        <td>用户列表</td>
    </tr>
    <tr>
        <td>用户ID</td>
        <td>手机号</td>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</center>
<script>
    $(function () {
        $.ajax({
            url:'do.php?a=userlist',
            type:'get',
            data:{},
            dataType:'json',
            success:function (e) {
                var t = '';
                $.each(e.data,function (i,v) {
                    t+='<tr><td>'+v.id+'</td><td>'+v.mobile+'</td></tr>';
                })
                $("#tab tbody").html(t);
            }
        })
    })
</script>
</body>
</html>
