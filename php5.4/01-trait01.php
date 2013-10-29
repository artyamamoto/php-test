<?php
//=== trait ===========
/**
 * Class Singleton
 * クラスをsingletonにする traitです。
 *
 * trait は機能はクラスとほぼ同じですが、以下のような機能があります。
 *   - サブクラスで利用する場合、use文を使う
 *   - 多重継承が可能
 *
 *   - 関数が重複する場合、どちらが優先されるかを選択しなければならない
 *   - 関数のエイリアスが定義できる。
 *   - trait で定義された関数はclassに優先する
 *
 *   - その他、サブクラスで関数の可視性（public/privateなど）を変更できるなど、
 *     通常のクラスよりも柔軟な設定が可能。
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
/**
 * Sampleクラスでは Singleton trait を use しているので
 * getInstance()メソッドが使えます。
 */
$i = Sample::getInstance();
var_dump($i);

?>
