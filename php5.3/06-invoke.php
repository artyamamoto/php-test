<?php
class Sample {
	public function __invoke() {
		echo __METHOD__, "<br />";
	}
}
$i = new Sample();
$i();

var_dump(is_callable($i));

?>
