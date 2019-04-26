<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/26
 * Time: 14:29
 */
if(empty($_REQUEST['id'])){
    echo 'error';exit;
}

$id = $_REQUEST['id'];
include 'Db.php';
$objDb = new Db();
//点击量增加
//$objDb->updateClick($id);
//查询
$rowInfo = $objDb->getRow($id);
//如果是5次生成静态页
if ($rowInfo['click']==4) {
    ob_start();
}
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
<table>
    <tr>
        <td>标题</td>
        <td><?php echo $rowInfo['title'];?></td>
    </tr>
    <tr>
        <td>作者</td>
        <td><?php echo $rowInfo['author'];?></td>
    </tr>
    <tr>
        <td>点击量</td>
        <td><span id="click"></span></td>
    </tr>
    <tr>
        <td>内容</td>
        <td><?php echo $rowInfo['content'];?></td>
    </tr>
</table>
</center>
</body>
</html>
<script>
    $(function () {
        $.ajax({
            url:'app.php?action=click',
            type:'get',
            data:{'id':<?php echo $rowInfo['id'];?>},
            dataType:'json',
            success:function (e) {
                $("#click").html(e.click);
            }
        })
    })
</script>
<?php
if ($rowInfo['click']==4){
    $contents = ob_get_clean();
    file_put_contents($id.'.html',$contents);
}
?>