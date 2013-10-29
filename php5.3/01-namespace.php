<?php
// namespaceを定義する場合、その前に命令文を書くことはできませんが、
// declare()は例外的にnamespaceの前に書くことができます。
declare(encoding='UTF-8');

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
$nslist = array(
	"\\app\\Test1" ,
	"\\app\\Test2" ,
);
foreach($nslist as $ns) :
    $cls = $ns."\\Main";
    $const = $ns."\\DEF";
?>
    <h3><?= $cls ?>クラス</h3>

    <h4>クラスの生成、dump</h4>
    <pre><?
        $i = new $cls();

        var_dump($i);
    ?></pre>

    <h4><?= $ns ?>\DEF 定数</h4>
    <pre><?= constant($const); ?></pre>
<?php
endforeach;

//echo "\\app\\Test1\\WESTPHALIA : ",\app\Test1\WESTPHALIA,"<br />";
//echo "\\app\\Test2\\WESTPHALIA : ",\app\Test2\WESTPHALIA,"<br />";


?>
