<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/12
 * Time: 10:23
 */
class Math{

    /**
     * 判断 参数 是否是水仙花
     *
     * @param $n 参数
     * @return bool true/false
     */
    public static function flower($n){
        //不符合规则
        if ($n<100 || $n>1000){
            return false;
        }

        //符合规则
        //1，字符串处理
//        $arr = str_split($n);
//        if ((pow($arr[0],3)+pow($arr[1],3)+pow($arr[2],3)) == $n){
//            return true;
//        }
        $gewei = $n%10;
        $shiwei = $n/10%10;
        $baiwei = floor($n/100);
        if ((pow($gewei,3)+pow($shiwei,3)+pow($baiwei,3))==$n){
            return true;
        }
        return false;
    }
}