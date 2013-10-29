<?php
namespace Exp;
class MyException1 extends \Exception {}

class MyException2 extends \Exception {}

class MyException3 extends \Exception {}

namespace main;
use Exp;
/*
 * 以下のような入れ子構造で例外を発生させます。
 * 		RuntimeException
 *          - MyException3
 *              - MyException2
 *                  - MyException1
 */
try {
	try {
		try {
			try {
				throw new \Exp\MyException1("This is MyException1",1);
			} catch(\Exp\MyException1 $e) {
				// MyException2 in MyException1 
				throw new \Exp\MyException2("This is MyException2",2,$e);
			}
		} catch(\Exp\MyException2 $e) {
			// MyException3 in MyException2
			throw new \Exp\MyException3("This is MyException3" , 3, $e);
		}
	} catch(\Exp\MyException3 $e) {
		// RuntimeException in MyException3
		throw new \RuntimeException("this is RuntimeException" , 100, $e);
	}
} catch(\Exception $e) {

	//=== getPrevious while exists ====
    echo '<pre>';
	$i = 0;
	do {
		printf('<h4>[%d] %s : %s</h4>',++$i, get_class($e) ,$e->getMessage());
        echo '<pre>',$e->getTraceAsString(),'</pre>';
		echo "\n";
	} while($e = $e->getPrevious());
	echo '</pre>';
}

?>
