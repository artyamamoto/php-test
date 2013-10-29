<?php
//=== trait ===========
/**
 * Class Singleton
 * クラスをsingletonにする traitです。
 *
 * trait は機能は抽象クラスとほぼ同じですが、以下のような機能があります。
 *   - サブクラスで利用する場合、use文を使う
 *   - 多重継承が可能
 *
 *   - 関数が重複する場合、どちらが優先されるかを選択しなければならない
 *   - 関数のエイリアスが定義できる。
 *   - trait で定義された関数はclassに優先する
 *
 *   - その他、サブクラスで関数の可視性（public/privateなど）を変更できるなど、
 *     通常のクラスよりも柔軟な設定が可能。
 *
 *   - instanceof / is_a でトレイトを利用しているかどうかは検証できないことに注意。
 *     ポリモーフィズム等は従来の class/interface でやる必要がある
 */
trait Singleton {
	protected function __construct() {}
	public static function getInstance() {
		static $instance = null;
		if (! $instance) 
			$instance = new self();
		
		return $instance;
	}
	public function __clone() {
		throw new RuntimeException("this instance can't be replicated.");
	}
}
//=== Sample =================
class Sample {
	use Singleton;
}
//=== main ====================
echo '<pre>';
/**
 * Sampleクラスでは Singleton trait を use しているので
 * getInstance()メソッドが使えます。
 */
echo '<h4>useしたtraitのgetInstance()によりインスタンス生成</h4>';
$i = Sample::getInstance();
var_dump($i);
/**
 * class_uses() 関数でクラスのトレイトを返します。
 * （但し、スーパークラスのトレイトは返しません）
 */
echo '<h4>class_uses() 関数はuseしているトレイトを返します</h4>';
echo "class_uses(\"Sample\") = ";
print_r(class_uses("Sample"));
/**
 * instanceof の右辺にトレイトを指定すると、なぜか false になる。
 */
echo '<h4>$instance instanceof trait はなぜかfalse</h4>';
echo 'var_dump($i instanceof Sample) = ';
var_dump($i instanceof Sample);
echo "\n";

echo 'var_dump($i instanceof Singleton) = ';
var_dump($i instanceof Singleton);
echo "\n";

/**
 * instanceof の右辺にトレイトを指定すると、なぜか false になる。
 */
echo '<h4>is_a($instance,trait) もなぜかfalse</h4>';
echo 'var_dump(is_a($i,Sample)) = ';
var_dump(is_a($i,"Sample"));
echo "\n";

echo 'var_dump(is_a($i,Singleton)) = ';
var_dump(is_a($i,"Singleton"));
echo "\n";

echo '</pre>';
?>
