<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/13
 * Time: 8:52
 */
class Math{
    /**
     * 返回n-m之间的所有水仙花数
     * @param $n
     * @param $m
     * return 数组
     */
    public static function getFlows($n,$m){
        $list = [];
        if ($n<100){
            $n = 100;
        }
        if ($m>999){
            $m = 999;
        }
        //处理过程
        for ($i=$n;$i<$m;$i++){
            $g = floor($i%10);
            $s = floor($i/10%10);
            $b = floor($i/100);

            $s = pow($g,3)+pow($s,3)+pow($b,3);
            if ($s==$i){
                $list[] = $i;
            }
        }

        return $list;
    }

    /**
     * 输出斐波那契数列的第n项
     * @param $n
     * return 数
     */
    public static function getFbnq($n){
        //1,2项
        if ($n==1 || $n==2){
            return 1;
        }

        $first = 1;
        $next = 1;
        $i=3;
        while (true){
            $v = $first+$next;
            //什么情况下退出
            if ($i==$n){
                return $v;
            }

            $first = $next;
            $next = $v;
            $i++;
        }
    }

    /**
     * 递归获取数据
     * @param $n
     * @return int
     */
    public static function getFbnq2($n){
        if ($n==1 || $n==2){
            return 1;
        }
        return self::getFbnq2($n-1)+self::getFbnq2($n-2);
    }

    /**
     *
     * @param $n
     */
    public static function getFbnqList($n){
        $list = [1,1];

        //计算
        while (true){
            $count = count($list);
            $v = $list[$count-1]+$list[$count-2];
            if ($v>$n){
                return $list;
            }
            $list[] = $v;
        }
        return $list;
    }

    /**
     * 1-100的和
     */
    public static function sum(){
        $sum = 0;
        for ($i=1;$i<=100;$i++){
            $sum+=$i;//$sum=$sum+$i;
        }

        return $sum;
    }

    /**
     * 1-100的和
     */
    public static function sum2(){
        $sum = $i = 0;
        while ($i<=100){
            $i++;
            $sum+=$i;
        }
        return $sum;
    }

    /**
     * 1-100
     * @param $n   结尾
     * @param int $i 开头
     * @param int $sum
     * @return float|int
     */
    public static function sum3($n,$i=1,$sum=0){
        if ($i<=$n){
            $sum+=$i;
            $i++;
            return self::sum3($n,$i,$sum);
        }else {
            return $sum;
        }
    }

    /**
     * 阶乘
     * @param $n
     */
    public static function jie($n){
        $s = 1;

        for ($i=$n;$i>=1;$i--){
            $s *= $i;
        }
        return $s;
    }

    /**
     * @param $n
     */
    public static function jie2($n){

    }

    /**
     * 回文字符串
     * @param $str
     * @return bool true/false
     */
    public static function huiwen($str){
        $str2 = strrev($str);
        if ($str==$str2){
            return true;
        }
        return false;
    }

    /**
     * 回文字符串2
     * @param $str
     */
    public static function huiwen2($str){
        $str2 = '';
        $len = strlen($str);
        for ($i=$len-1;$i>=0;$i--){
            $str2.=$str[$i];
        }
        if ($str==$str2){
            return true;
        }
        return false;
    }
}