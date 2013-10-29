<?php
/**
 * Class Person
 *
 * getStatic() -> static::で呼ばれた場合のクラス名
 * getSelf() -> self:: で呼ばれた場合のクラス名です。
 */

class Person {
    public static function who() {
		echo __CLASS__,"\n"; 
	}
	public static function getStatic() {
		static::who();
	}
	public static function getSelf() {
		self::who();
	}
}

/**
 * Class YukioMishima
 *
 * Person -> YukioMishima という継承関係となります。
 * static::hoge();  -> サブクラスのstaticメソッド
 * self::hoge();    -> 定義された時点でのクラス（スーパークラス）のstaticメソッド
 *
 * 但し、self:: がスーパークラスの情報を参照できるのはstaticメソッドのみであり、
 * static変数についてはオーバーライトされたものは参照できない。（実験済み）
 */
class YukioMishima extends Person {
	public static function who() {
		echo __CLASS__,"\n";
	}
}
//=== main ================
echo '<pre>';
echo "YukioMishima::getStatic() : " , YukioMishima::getStatic() , "\n";
echo "YukioMishima::getSelf() : " , YukioMishima::getSelf() , "\n";
echo '</pre>';
?>
