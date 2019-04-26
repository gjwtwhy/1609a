<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/26
 * Time: 8:49
 */
$title = isset($_REQUEST['title'])?$_REQUEST['title']:'';
$author = isset($_REQUEST['author'])?$_REQUEST['author']:'';
$page = isset($_REQUEST['page'])?$_REQUEST['page']:1;

include 'Db.php';
$objDb = new Db();
$list = $objDb->getList($title,$author,$page);

$hot = $objDb->getHotSearch();
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
    <form action="index.php" method="get">
    <table>
        <tr>
            <td>
                搜索：标题:<input type="text" name="title" value="<?php echo $title;?>">作者：<select name="author">
                    <option value="">请选择</option>
                    <option value="a" <?php if ($author=='a'){?>selected<?php }?>>a</option>
                    <option value="b" <?php if ($author=='b'){?>selected<?php }?>>b</option>
                </select>
                <input type="submit" value="搜索">
            </td>
        </tr>
        <tr>
            <td>
                热搜：
                <?php
                foreach ($hot as $k => $v) {
                    echo $k.'   ';
                }
                ?>
            </td>
        </tr>
    </table>
    </form>
<table border="1">
    <tr>
        <td>ID</td>
        <td>标题</td>
        <td>作者</td>
        <td>操作</td>
    </tr>
    <?php
    foreach ($list['list'] as $k=>$v) {
        ?>
        <tr>
            <td><?php echo $v['id'];?></td>
            <td>
                <?php
                echo str_replace($title,'<font color=red>'.$title.'</font>',$v['title']);
                ?></td>
            <td><?php echo $v['author'];?></td>
            <td><a href="show.php?id=<?php echo $v['id'];?>">详情页</a> <a href="#" onclick="del(<?php echo $v['id'];?>)">删除</a> </td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td colspan="4">
            <?php
            for ($i=1;$i<=$list['totalpage'];$i++){
                echo "<a href='index.php?title=$title&author=$author&page=$i'>".$i.'</a>   ';
            }
            ?>
        </td>
    </tr>
</table>
</center>
</body>
</html>
<script>
function del(id) {
    $.ajax({
        url:'app.php?action=del',
        type:'get',
        data:{'id':id},
        dataType:'json',
        success:function (e) {
            if(e==1){
                location.reload();
            }
        }
    })
}
</script>
