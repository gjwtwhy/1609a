<?php
/**
 * DB单例封装
 * User: guoju
 * Date: 2019/4/17
 * Time: 10:24
 */
class Single{
    private static $_instance=null;//存储这个类实例
    private $_pdo = null;
    private function __construct()//私有的构造函数
    {
        $this->_pdo = new PDO('mysql:host=localhost;dbname=9a;charset=utf8','root','');
    }
    private function __clone()//限制了无法克隆这个类
    {
        // TODO: Implement __clone() method.
    }
    public static function getInstance(){//获取类实例
        if (!(self::$_instance instanceof Single)){
            self::$_instance = new Single();
        }
        return self::$_instance;
    }

    /**
     * 返回数据库连接对象
     */
    public function getPdo(){
        return $this->_pdo;
    }
}