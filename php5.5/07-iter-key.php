<?php
/*
 * foreachの key に配列を受けることができます。
 * （但し、list()関数で受け取るとエラーになります）
 * 但し、Iteratorインターフェースを実装したクラス限定です。（定義する方法がないため）
 */
class Sample implements Iterator {
	private $list = array();
	public function __construct($list) {
		$this->list = $list;
	}
	public function rewind() {
		reset($this->list);
	}
	public function current() {
		// return current($this->list);
        $v = current($this->list);
        $ed = $v + 3;
        return range($v,$ed);
	}
	public function key() {
		// return key($this->list); // キーのスカラー値を返す場合はこちら
        $v = current($this->list);
        $st = $v - 3;
		return range($st,$v);
	}
	public function next() {
		return next($this->list);
	}
	public function valid() {
		$key = key($this->list);
		return ($key !== null && $key !== false);
	}
}

$i = new Sample(range(10,20));

echo '<h4>Iteratorのサブクラスでkeyを配列にする</h4>';
echo "<ul>";
foreach($i as $key => $value) {
    printf("<li>%s => %s</li>",
        join(",",$key),
        join(",",$value));
}
echo "</ul>";

?>
