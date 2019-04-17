<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/17
 * Time: 10:29
 */
include 'Single.php';
include 'Model.php';
$objModel = new Model();
$list = $objModel->table('elm_user')->field('mobile')->where(['id'=>1,'mobile'=>'135222'])->select();
var_dump($list);

$student = $objModel->table('student')->field('name,age')->where([])->select();
var_dump($student);