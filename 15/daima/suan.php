<?php
/**
 * 1．学校超时搞促销活动，饮料2元一瓶，2个空瓶子换一瓶饮料，4个瓶盖换一瓶饮料。
请问小明有20元，最多可以买多少瓶饮料喝。
 * User: guoju
 * Date: 2019/4/26
 * Time: 16:52
 */
/**
 * 1题-递归
 * @param $m
 * @return float
 */
function refresh($m){
    $p= floor($m/2);
    //空瓶数量
    $e = $p;
    //瓶盖数量
    $g = $p;
    $t = ref($e,$g,$p);
    return $t;
}
function ref($e,$g,$t){
    $ep = floor($e/2);
    $gp = floor($g/4);
    $t += $ep;
    $t += $gp;

    $e1 = $e%2;
    $g1 = $g%4;
    $e = $ep+$gp+$e1;
    $g = $ep+$gp+$g1;

    if ($e>1 || $g>3){
        return ref($e,$g,$t);
    } else {
        return $t;
    }
}

/**
 * 1题-非递归
 * @param $m
 * @return int
 */
function a($m){
    $kp = $g = $p = 0;
    for ($i=$m/2;$i>0;$i--){//喝掉一瓶
        $kp++;
        $g++;
        while ($kp>=2){
            $kp-=2;
            $i++;
        }
        while ($g>=4){
            $g-=4;
            $i++;
        }
        $p++;
    }
    return $p;
}