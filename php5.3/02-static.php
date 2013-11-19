<?php
/**
 * static に自分自身のクラスを参照するには self:: 、static:: の２種類があります。
 *
 * - self:: 命令が書かれた段階のクラス（スーパークラス）
 * - static:: 呼ばれたクラス
 *
 * 但し、staticコンテキストの変数（メンバー変数やstatic関数内の定数）は
 * 宣言しなおさない限り、おそらくスーパークラスとサブクラスで
 * 同じ実体へのポインタを示しているっぽい。
 */

class Person {
    public static function who() {
		echo __CLASS__,"\n"; 
	}
	public static function getStaticClassname() {
		static::who();
	}
	public static function getSelfClassname() {
		self::who();
	}
    //=== シングルトンを self::、static::で実装してみる。
    protected static $instance = null;
    public static function getSelfInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public static function getStaticInstance() {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}

/**
 * Class YukioMishima
 *
 * Person -> YukioMishima という継承関係となります。
 */
class YukioMishima extends Person {
    // 宣言しなおさないと YukioMishima::$instance と
    // Person::$instance の指し示す実態が同じになるっぽい
    protected static $instance = null;

    // 宣言しなおさないと、スーパークラスから static::who() と呼ばれても
    // スーパークラスの who() メソッドが呼ばれる。
	public static function who() {
		echo __CLASS__,"\n";
	}
}
//=== main ================
echo '<pre>';
echo "static::who() : " , YukioMishima::getStaticClassname() , "\n";
echo "self::who() : " , YukioMishima::getSelfClassname() , "\n";
echo "new static() : " ;
var_dump(YukioMishima::getStaticInstance());
echo "new self() : " ;
var_dump(YukioMishima::getSelfInstance());
echo '</pre>';
?>
