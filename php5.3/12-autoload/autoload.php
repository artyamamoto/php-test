<?php
/*
 * __autoload() 関数を定義します。
 */
function __autoload($classname) {
    printf("__autoload(%s) called.\n" , $classname);

    if (preg_match('/[^\d\w_\\\\]/',$classname))
        throw new Exception("$classname not exists!");

    $path = trim($classname,"_\\ ");
    $path = ucwords(preg_replace('/[_\\\\]+/', ' ',$classname));
    $path = str_replace(' ','/',$path).'.php';

    $path = dirname(__FILE__).'/'.$path;
    if (is_file($path))
        require_once $path;
    else
        throw new Exception("$path for $classname not exists!");
}
