<?php
/**
 * Class Sample
 *
 * __call(), __callStatic()
 * どちらも、__METHOD__定数と引数を出力しているだけ
 */
class Sample {
	public function __call($method,$arguments) {
		printf("__METHOD__ = %s\n",__METHOD__);
        printf("\$method = %s\n" , $method);
        printf("\$arguments = %s\n" ,print_r($arguments,true));
	}
	public static function __callStatic($method,$arguments) {
        printf("__METHOD__ = %s\n",__METHOD__);
        printf("\$method = %s\n" , $method);
        printf("\$arguments = %s\n" ,print_r($arguments,true));
	}
}

//=== main ============================
$i = new Sample();

echo '<h3>存在しない関数の呼び出し</h3>';
echo '<pre>';
$i->hoge("a","b","c");
echo '</pre>';

echo '<h3>存在しないstatic関数の呼び出し</h3>';
echo '<pre>';
Sample::hoge("a","b","c");
echo "</pre>";

?>
