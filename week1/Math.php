<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/15
 * Time: 11:39
 */
class Math{

    /**
     * 用数组处理函数
     * 返回数组内最大值，最小值和平均值
     * @param $arr [1,2,3,4]
     */
    public static function getArrData($arr){
        //平均
        $sum = array_sum($arr);
        $num = count($arr);
        $avg = round($sum/$num,2);

        //最大值
        $max = max($arr);

        //最小值
        $min = min($arr);

        return ['avg'=>$avg, 'max'=>$max, 'min'=>$min];
    }

    /**
     * 不用数组处理函数来计算 平均值，最大值，最小值
     * [1,2,3,4,5]
     * @param $arr
     */
    public static function getArrData2($arr){
        $len = count($arr);
        $sum = 0;
        $max = 0;
        $min = 0;

        //循环数组赋值
        for ($i=0; $i<$len; $i++){
            $sum += $arr[$i];
            //给最大赋值
            if ($max==0 || $arr[$i]>$max){
                $max = $arr[$i];
            }
            //给最小赋值
            if ($min==0 || $arr[$i]<$min){
                $min = $arr[$i];
            }
        }

        //计算平均值
        $avg = round($sum/$len,2);

        //返回
        return ['avg'=>$avg, 'max'=>$max, 'min'=>$min];
    }

    /**
     * 返回99乘法表
     */
    public static function nine1(){
        $arr = [];

        //处理
        for ($i=1;$i<=9;$i++){
            $str = [];
            for($j=1;$j<=$i;$j++){
                $str[] = "  ".$j.'x'.$i."=".$j*$i;
            }
            $arr[] = $str;
        }

        return $arr;
    }

    /**
     * while
     */
    public static function nine2(){
        $arr = [];

        $i = 1;
        while ($i<=9){
            $str = [];
            $j = 1;
            while ($j<=$i){
                $str[] = "  ".$j.'x'.$i."=".$j*$i;
                $j++;
            }
            $arr[] = $str;
            $i++;
        }

        return $arr;
    }

}