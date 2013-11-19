<?php


class MyClass2
{
    public $one = "one";
    public $two = "two";
    public static $three = "three";

    public function method1($hoge)
    {

    }
    public function method2($fuga)
    {
        self::method3($fuga, 2);
        $i = 1;

    }
    public static function method3($arg, $argtwo)
    {

    }
}