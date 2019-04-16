<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/16
 * Time: 10:48
 */
class ElmUser{
    private $_db;
    //pdo数据库连接
    public function __construct()
    {
        $this->_db = new PDO('mysql:host=localhost;dbname=9a;charset=utf8','root','');
    }

    /**
     * 登录查询
     * @param $username
     * @param $pwd
     */
    public function getUserPwd($mobile,$pwd){
        $sql = "select * from elm_user where mobile=:mobile and pwd=:pwd";
        $rtm = $this->_db->prepare($sql);
        $rtm->execute([':mobile'=>$mobile,':pwd'=>$pwd]);
        return $rtm->fetch();
    }

    /**
     * 查询列表数据
     * @return array
     */
    public function getList(){
        $sql = "select id,mobile from elm_user order by id desc";
        return $this->_db->query($sql)->fetchAll();
    }
}
?>

