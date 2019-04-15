<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/15
 * Time: 11:52
 */
include 'Math.php';
//$list = Math::getArrData([7,1,8,2,9,6]);
//$list1 = Math::getArrData2([7,1,8,2,9,6]);
$list3 = Math::nine2();
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
<table border="1">
    <?php
    foreach ($list3 as $k=>$v) {
        ?>
        <tr>
            <?php
            foreach ($v as $kk=>$vv) {
                ?>
                <td><?php echo $vv; ?></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
