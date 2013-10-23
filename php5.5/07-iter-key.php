<?php

class Sample implements Iterator {
	private $list = array();
	public function __construct($list) {
		$this->list = $list;
	}
	public function rewind() {
		reset($this->list);
	}
	public function current() {
		return current($this->list);
	}
	public function key() {
		// return key($this->list);
		return range(0, current($this->list));
	}
	public function next() {
		return next($this->list);
	}
	public function valid() {
		$key = key($this->list);
		return ($key !== null && $key !== false);
	}
}

$i = new Sample([1,2,3,4,5]);
echo "<pre>";
foreach($i as $key => $value) {
	echo "<table border='1'><tr>";
	echo "<th>\t\tkey : ";
	var_dump($key);
	echo "</th><td>";
	echo "\t\tvalue";
	var_dump($value);
	echo "</td></table>";
}
echo "</pre>";
?>
