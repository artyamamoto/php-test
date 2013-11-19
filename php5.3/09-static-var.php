<?php
/**
 * 文字列に対して static変数/メソッドを取得するようなシンタックスを書くと、
 * その文字列のクラスに対する staticアクセスとなる。
 */
class Sample1 {
	public static $foo = "bar";
    public static function hoge() {
        return "fuga";
    }
}

$classname = "Sample1";
echo "\$classname::\$foo -> ",$classname::$foo , "<br />\n";
echo "\$classname::hoge() -> ",$classname::hoge(), "<br />\n";
?>
