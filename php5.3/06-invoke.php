<?php
/**
 * Class Sample
 * __invoke() 関数を定義
 */
class Sample {
	public function __invoke() {
		echo __METHOD__, "<br />";
	}
}
//=== main ==============
$i = new Sample();
echo '<h4>Sampleクラスのインスタンスそのものを関数として呼び出す</h4>';
$i();

echo '<h4>__invoke()関数が定義されたクラスのインスタンスを is_callable()に渡すとtrueになる</h4>';
echo "is_callable(new Sample()) = ";
var_dump(is_callable($i));

?>
