<?php
class MyException1 extends Exception {}
class MyException2 extends Exception {}
class MyException3 extends Exception {}

try {
	try {
		try {
			try {
				throw new MyException1("This is MyException1",1);
			} catch(MyException1 $e) {
				// MyException2 in MyException1 
				throw new MyException2("This is MyException2",2,$e);
			}
		} catch(MyException2 $e) {
			// MyException3 in MyException2
			throw new MyException3("This is MyException3" , 3, $e);
		}
	} catch(MyException3 $e) {
		// RuntimeException in MyException3
		throw new RuntimeException("this is RuntimeException" , 100, $e);
	}
} catch(Exception $e) {
	/**
		RuntimeException
			- MyException3
				- MyException2
					- MyException1
	**/
	echo '<pre>';
	
	//=== Trace === 
	echo '<h2>$e->getTraceAsString();</h2>';
	echo $e->getTraceAsString();
	
	//=== getPrevious while exists ==== 
	echo '<h2>$e->getPrevious();</h2>';
	$i = 0;
	do {
		printf('%d: [%s] %s',++$i, get_class($e) ,$e->getMessage());
		echo "\n";
	} while($e = $e->getPrevious());
	echo '</pre>';
}

?>
