<?php
class Sample {
	public function test() {
		$i = 0;	
		
		print_r(array_map(function($n) use(&$i) {
			printf( "%d : lambda in %s\n", (++$i) , get_class($this));
			return ($n * $n * $n);
		}, [1,2,3,4,5]));
	}
}

echo '<pre>';
$Sample = new Sample();
$Sample->test();
echo '</pre>';
?>
