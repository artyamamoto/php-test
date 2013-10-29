<?php
class Sample {
	public static $foo = "bar";
}
$classname = "Sample";

// クラス名を文字列にしてstatic変数にアクセスできます。
echo $classname::$foo;

?>
