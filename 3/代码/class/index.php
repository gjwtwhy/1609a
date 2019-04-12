<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/12
 * Time: 9:43
 */
include 'Person.php';
include 'Walk.php';
include 'Student.php';
$obj1 = new Student('张三1',11);
$obj2 = new Student('张三2',12);
$obj3 = new Student('张三3',15);
$obj4 = new Student('张三4',25);
$obj5 = new Student('张三5',10);
$obj6 = new Student('张三6',6);
$obj7 = new Student('张三7',21);
$obj8 = new Student('张三8',1);

//echo $obj8->getMax();
echo $obj3->eat();

//1,包含文件
//include 'Person.php';
////2，实例化
//$objPerson = new Person('张三','女');
//$sex = $objPerson->_sex;
//echo $sex;
//////3, 调用方法
////$rs = $objPerson->run();
////var_dump($rs);
////
////$objPerson1 = new Person('李四','男');
////$rs1 = $objPerson1->run();
////var_dump($rs1);
//
//$objPerson->hello();

//include 'Child.php';
//$obj1 = new Child('张三');
//$obj2 = new Child('lisi');
//$obj3 = new Child('张三2');
//$obj1->joinGame();
//$obj2->joinGame();
//$obj3->joinGame();
//$obj3->j();
//
//echo $obj3::$totalcount;
