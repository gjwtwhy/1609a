<?php
/**
 * Created by PhpStorm.
 * User: guoju
 * Date: 2019/4/12
 * Time: 15:24
 */
class Student extends Person implements Walk {
    private static $_maxage=0;
    private static $_maxname='';
    public function __construct($name,$age)
    {
        $this->name = $name;
        $this->age = $age;
        //年龄判断,判断对象的年龄是否大于静态属性值
        if ($age > self::$_maxage){
            self::$_maxage = $age;
            self::$_maxname = $name;
        }
    }

    public function eat(){
        return '香蕉';
    }

    public function run()
    {
        // TODO: Implement run() method.
        return 'this is student run';
    }

    public function speak()
    {
        // TODO: Implement speak() method.
    }

    /**
     * 返回最大name值
     * @return string
     */
    public function getMax(){
        return self::$_maxname;
    }
}