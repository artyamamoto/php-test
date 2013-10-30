<?php
// namespaceを定義する場合、その前に命令文を書くことはできませんが、
// declare()は例外的にnamespaceの前に書くことができます。

// PHP5.3ではdeclare encodingするにはコンパイル時に --enable-zend-multibyte が必要です。
// declare(encoding='UTF-8');

// app\Test1 ----------------------------
/**
 * class \app\Test1\Main
 * const \app\Test1\WESTPHALIA
 */
namespace app\Test1;

const DEF = "TEST1";
class Main {
	public function __construct() {
		echo __METHOD__, "<br />";
	}
}
// app\Test2 ----------------------------
/**
 * class \app\Test2\Main
 * const \app\Test2\WESTPHALIA
 * use \app\Test1
 *
 * ※\app\Test1\Mainを絶対パスで指定しているため、
 * 　今回のサンプルでは実際には use 文は不要です。
 */
namespace app\Test2;
use \app\Test1;

const DEF = "TEST2";
class Main extends \app\Test1\Main {
	public function __construct() {
		parent::__construct();
		echo __METHOD__ , "<br />";
	}
}
// main ----------------------------
namespace main;
?>
<!-- \app\Test1\Main -->
<h3>\app\Test1\Mainクラス</h3>

<h4>クラスの生成、dump</h4>
<pre><?
    $i = new \app\Test1\Main();
    var_dump($i);
    ?></pre>

<h4>\app\Test1\DEF</h4>
<pre><?= \app\Test1\DEF ?></pre>

<!-- \app\Test2\Main -->
<h3>\app\Test2\Mainクラス</h3>

<h4>クラスの生成、dump</h4>
<pre><?
    $i = new \app\Test2\Main();
    var_dump($i);
    ?></pre>

<h4>\app\Test2\DEF</h4>
<pre><?= \app\Test2\DEF ?></pre>
