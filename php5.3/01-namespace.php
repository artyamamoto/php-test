<?php
// declare()は例外的にnamespaceの前に書くことができます。
declare(encoding='UTF-8');

// app\Test1 ----------------------------
namespace app\Test1;
const WESTPHALIA = "ウェストファリア";
class Main {
	public function __construct() {
		echo __METHOD__, "<br />";
	}
}
// app\Test2 ----------------------------
namespace app\Test2;
use \app\Test1;
const WESTPHALIA = "ウェストファリア条約";
class Main extends \app\Test1\Main {
	public function __construct() {
		parent::__construct();
		echo __METHOD__ , "<br />";
	}
}
// main ----------------------------
namespace main;
$classes = array(
	"\\app\\Test1\\Main" , 
	"\\app\\Test2\\Main" , 
);
foreach($classes as $cls) { 
	echo '<pre>';
	echo $cls,"<br />";
	$i = new $cls();
	print_r($i);
	echo '</pre>';
}
echo "\\app\\Test1\\WESTPHALIA : ",\app\Test1\WESTPHALIA,"<br />";
echo "\\app\\Test2\\WESTPHALIA : ",\app\Test2\WESTPHALIA,"<br />";


?>
