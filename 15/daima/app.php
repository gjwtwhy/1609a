<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/26
 * Time: 14:46
 */
$aciton = $_REQUEST['action'];
if ($aciton=='click'){
    $id = $_REQUEST['id'];
    include 'Db.php';
    $objDb = new Db();
//点击量增加
    $objDb->updateClick($id);
    $rowInfo = $objDb->getRow($id);
    echo json_encode(['click'=>$rowInfo['click']]);
}

//删除操作
if ($aciton=='del'){
    $id = $_REQUEST['id'];
    include 'Db.php';
    $objDb = new Db();
    $objDb->delete($id);

    if (file_exists($id.'.html')){
        unlink($id.'.html');
    }
    echo 1;exit;
}
?>