<?php
/*
 * staticメソッドに対して Class::{$expr}() という形で呼び出せます。
 * 但し、PhpStorm7 ではシンタックスエラーとされてしまうため、赤いマークがつきます。
 */
class Sample {
	public static function funcTest() {
		echo __METHOD__," called \n";
	}
}

$method = "test";
Sample::{"func" . ucfirst($method)}();


?>
