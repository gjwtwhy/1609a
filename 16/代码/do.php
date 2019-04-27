<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/27
 * Time: 15:56
 */
//1,接值,参数判断

$data = [];
$data['mobile'] = $_POST['mobile'];
$data['pwd'] = $_POST['pwd'];
$data['name'] = $_POST['name'];
$data['sex'] = $_POST['sex'];

//2,入库
include 'Db.php';
$objDb = new Db();
$objDb->addData($data);

//3, 返回数据