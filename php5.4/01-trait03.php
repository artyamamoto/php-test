<?php
/**
 * その他のトレイトの特徴
 * - トレイトはトレイトを継承できます。
 * - トレイトは抽象メソッドを定義できます。
 * - トレイトはstatic変数/メソッドを定義できます。
 */
trait Bread {
    public static $weight = "light";

    public function smells(){
        return "Good!";
    }
    abstract public function tastes();
}
trait PizzaBread {
    public $egg = 1;

    use Bread;
    public function smells() {
        return "Excellent!";
    }
    public function tastes() {
        return "Yummy!";
    }
    public static function getTomato() {
        return "a lot of tomato";
    }
}
class SuperUltraSpecialExcellentCheesePizzaBreadBeyondTheWorld {
    use PizzaBread;

    // トレイトで設定したプロパティはサブクラスで上書きできません。
    //public $egg = 1; // Strict Error
    //public $egg = 2; // Fatal Error
    //public static $weight = 2; // Fatal Error
}
$Bread = new SuperUltraSpecialExcellentCheesePizzaBreadBeyondTheWorld();

echo '<pre>';
echo '<h4>traitのstatic変数/メソッド</h4>';
printf('SuperUltraSpecialExcellentCheesePizzaBreadBeyondTheWorld::$weight = %s'."\n",
    SuperUltraSpecialExcellentCheesePizzaBreadBeyondTheWorld::$weight );
printf('SuperUltraSpecialExcellentCheesePizzaBreadBeyondTheWorld::getTomate() = %s'."\n",
    SuperUltraSpecialExcellentCheesePizzaBreadBeyondTheWorld::getTomato() );

echo '<h4>traitの変数/メソッド</h4>';
printf('$Bread->egg = %d'."\n",$Bread->egg);
printf('$Bread->smells() = %s'."\n",$Bread->smells());
printf('$Bread->tastes() = %s'."\n",$Bread->tastes());


echo '</pre>';
