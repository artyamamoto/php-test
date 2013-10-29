<?php
class Sample {
	public static function funcTest() {
		echo __METHOD__," called \n";
	}
}

$method = "test";
Sample::{"func" . ucfirst($method)}();


?>
