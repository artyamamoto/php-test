<?php
/*
 * - クロージャ内部から $this にアクセスできます。
 */

class Sample {
    public $people = array("ほげお","かずお","ゆきお","よしお","ひさお","ジョン");
	public function test() {
		print_r(array_map(function($i) {
			return $this->people[$i++];
		}, [0,2,4]));
	}
}

echo '<pre>';
(new Sample())->test();
echo '</pre>';
?>
