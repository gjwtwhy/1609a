<?php

namespace app\admin\model;

use think\Model;
use app\admin\model\RedUserLog;
use app\admin\model\RedUser;

class RedLog extends Model
{

    /**
     * 红包金额，红包份数
     * @param $money
     * @param $num
     */
    public function addRed($uid, $money,$num){
        //判断用户钱够不够
        $userInfo = RedUser::get($uid);
        if ($userInfo['money']<$money){
            return false;
        }

        //获取每一个份金额
        $redlist = $this->redbag($money,$num);
        if (!$redlist){
            return false;
        }
        //添加红包记录
        $this->uid = $uid;
        $this->money = $money;
        $this->num = $num;
        $this->create_time = time();
        $this->save();

        $redid = $this->id;
        //添加每一份记录
        foreach ($redlist as $k => $v) {
            $objUserLog = new RedUserLog();
            $objUserLog->uid = $uid;
            $objUserLog->redid = $redid;
            $objUserLog->money = $v;
            $objUserLog->save();
        }

        //发放红包的人金额减少
        $money = $userInfo['money']-$money;
        $objUser = new RedUser();
        $objUser->save(['money'=>$money],['id'=>$uid]);

        return true;
    }

    /**
     * 红包算法
     * @param $m 总钱数
     * @param $n 总份数
     * 1：总金额不能小于：红包份数 * 0.01
     * 2：每一份的最大金额不能大于 (红包总金额 / 红包份数) * 2
     * 3：每一份最小金额不能小于0.01
     * 返回 n份对应的金额 []
     */
    public  function redbag($m,$n){
        //不符合规则
        if ($m< $n*0.01){
            return false;
        }
        //就一份
        if ($n==1){
            return [$m];
        }

        //份数多
        $list = [];//存每一份的金额
        $max = ($m/$n)*2;
        $min = 0.01;
        //一份一份算，循环处理,动态规划
        for ($i=$n; $i>0;$i--){
            if ($i==1){
                $list[] = $m;
                break;
            }

            $_max = $m-($i-1)*0.01;//每一份最大值=当前剩余金额-剩余分数*0.01;
            if ($_max>$max){//超出限定，以限定的最大值为准
                $_max = $max;
            }

            //最小值
            $_min = $m-($i-1)*$max;//每一份的最小值=当前剩余金额-剩余分数*理论最大值
            if ($_min<$min){
                $_min = $min;
            }

            //从$_min到$_max之间随机出一个数
            $s = rand($_min*100,$_max*100);
            $s = round($s/100,2);
            $list[] = $s;
            $m = round($m-$s,2);
        }

        return $list;
    }
}
