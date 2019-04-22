<?php
namespace app\week\model;

use think\Model;
use think\Db;

class WeekUser extends Model
{
    /**
     * 传页码返回分页数据，同时返回总页数
     * @param $page
     */
    public function getList($page){
        $pagenum = 10;//每页显示数量
        $offset = ($page-1)*$pagenum;//
        $sql = "select * from week_user order by id desc limit $offset,$pagenum";
        $list = Db::query($sql);

        //计算总数量
        $totalcount = self::count();
        $totalpage = ceil($totalcount/$pagenum);

        return ['list'=>$list,'totalpage'=>$totalpage,'totalcount'=>$totalcount];
    }
}