<?php
class Sample {
	public function __call($method,$arguments) {
		echo __METHOD__,"\n";
		echo $method, "\n";
		print_r($arguments);
	}
	public static function __callStatic($method,$arguments) {
		echo __METHOD__,"\n";
		echo $method, "\n";
		print_r($arguments);
	}
}
echo "<pre>";
$i = new Sample();
$i->hoge("a","b","c");

Sample::hoge("a","b","c");
echo "</pre>";

?>
