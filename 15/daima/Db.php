<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/26
 * Time: 10:24
 */
class Db{
    private $_PDO=null;
    private $_pagenum = 1;
    private $_mem = null;
    public function __construct()
    {
        $this->_PDO= new PDO('mysql:host=localhost;dbname=9a;charset=utf8','root','');
        //memcache
        $this->_mem = new memcache();
        $this->_mem->connect('127.0.0.1',11211);
    }

    /**
     * 获取新闻列表
     */
    public function getList($title,$author,$page){
        //缓存处理
        if ($title){
            $key = 'seach';
            $seachList = $this->_mem->get($key);//查询缓存内数据
            if (isset($seachList[$title])){//查看数据内是否含有当前搜索词
                $seachList[$title]++;//有对值++
            } else {
                $seachList[$title] = 1; //没有赋值
            }
            $this->_mem->set($key,$seachList);//写入memcache
        }
        //
        $offset = ($page-1)*$this->_pagenum;
        //搜索后sql
        if (empty($title) && empty($author)){
            $sql = "select * from news order by id desc ";
        } else {
            $where = 'where ';
            if ($title){
                $where.= "title like '%$title%' and ";
            }
            if ($author){
                $where.="author = '$author' and ";
            }
            $where = substr($where,0,-4);
            $sql = "select * from news $where order by id desc";
        }
        $totalList= $this->_PDO->query($sql)->fetchAll();
        $totalPage = ceil(count($totalList)/$this->_pagenum);

        //page数据
        $sql .= " limit $offset,$this->_pagenum";
        $pageList = $this->_PDO->query($sql)->fetchAll();

        return ['list'=>$pageList,'totalpage'=>$totalPage];
    }

    /**
     * 获取单条数据
     * @param $id
     * @return mixed
     */
    public function getRow($id){
        $sql = "select * from news where id=$id";
        return $this->_PDO->query($sql)->fetch();
    }

    /**
     * 点击量处理
     * @param $id
     * @return int
     */
    public function updateClick($id){
        $sql = "update news set click=click+1 where id=$id";
        return $this->_PDO->exec($sql);
    }

    public function delete($id){
        $sql = "delete from news where id=$id";
        return $this->_PDO->exec($sql);
    }

    /**
     * 返回热搜词
     */
    public function getHotSearch(){
        $key = 'seach';
        $list = $this->_mem->get($key);
        arsort($list);
        return $list;
    }
}