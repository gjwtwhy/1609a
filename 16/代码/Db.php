<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/27
 * Time: 15:49
 */
class Db{
    private $_pdo;
    public function __construct()
    {
        $this->_pdo = new PDO('mysql:host=localhost;dbname=9a;charset=utf8','root','');
    }

    /**
     * 添加数据
     * @param $data
     */
    public function addData($data){
        try{
            //开启
            $this->_pdo->beginTransaction();
            $sql1 = "insert into elm_user (mobile,pwd) VALUES (?,?)";
            $stmt = $this->_pdo->prepare($sql1);
            $flag = $stmt->execute([$data['mobile'],$data['pwd']]);
            if (!$flag){
                throw new PDOException('添加用户失败');
            }
            $uid = $this->_pdo->lastInsertId();
            $sql2 = "insert into elm_userinfo(uid,name,sex) VALUES ($uid,?,?)";
            $stmt = $this->_pdo->prepare($sql2);
            $flag = $stmt->execute([$data['name'],$data['sex']]);
            if (!$flag){
                throw new PDOException('添加用户信息失败');
            }
            //提交事务
            $this->_pdo->commit();
        }catch(PDOException $e){
            //回滚
            $this->_pdo->rollBack();
            return false;
        }

        return true;
    }
}