<?php
/**
 * traitとクラスの優先順位について
 *  - トレイトのメソッドはスーパークラスのメソッドに優先します。
 *  - trait同士でのメソッドの競合は定義しないとエラーになります。
 *
 *                                  Swimable
 *                                  ↓
 * (interface)Creature  -> Bird  -> Swan
 *                               -> Penguin
 *                         ↑        ↑
 *                         Flyable  Swimable
 *                                  NotFlyable
 */
trait Swimable {
	public function swim() { return __METHOD__."\n"; }
}
trait NotFlyable {
    public function fly() { return __METHOD__."\n"; }
}
trait Flyable {
    public function fly() { return __METHOD__."\n"; }
}
interface Creature {
    public function born();
}
abstract class Bird implements Creature {
    use Flyable;
    public function born() { return __METHOD__."\n"; }
    public function swim() {
        echo "Some birds can swim, but i can't. \n";
    }
}
class Swan extends Bird {
    use Swimable;
}
class Penguin extends Bird {
    //use Swimable , Flyable, NotFlyable {
    //  このようにメソッドが重複する場合、insteadof 構文を使って優先するメソッドを定義する
    //  NotFlyable::fly insteadof Flyable;

    //  スーパークラスでuseしたトレイトで何かしたい場合、もう一回 use分に追加する必要がある
    //  Flyable::fly as private inFactFly;
    //}
    use Swimable , NotFlyable {
        NotFlyable::fly as public tryToFly;        // tryToFly() という名前で fly() 関数を呼べるようにする。
    }
}
echo '<pre>';
echo '<h3>Swan</h3>';
$Swan = new Swan();

echo '<table border="1">';
printf('<tr><th>$Swan->swim()</th><td>%s</td></tr>', $Swan->swim());
printf('<tr><th>$Swan->fly()</th><td>%s</td></tr>', $Swan->fly());
echo '</table>';

echo '<h3>Penguin</h3>';
$Penguin = new Penguin();

echo '<table border="1">';
printf('<tr><th>$Penguin->swim()</th><td>%s</td></tr>', $Penguin->swim());
printf('<tr><th>$Penguin->fly()</th><td>%s</td></tr>', $Penguin->fly());
printf('<tr><th>$Penguin->tryToFly()</th><td>%s</td></tr>', $Penguin->tryToFly());
echo '</table>';

echo '</pre>';

/**
class Talker {
	use Kinnikuman, Ramenman {
		Ramenman::bigTalk insteadof Kinnikuman;
		Kinnikuman::smallTalk insteadof Ramenman;

		Ramenman::smallTalk as ramenTalk;
		Kinnikuman::bigTalk as private kinnikuTalk;
	}
}
echo '<pre>';
$Talker = new Talker;
$Talker->bigTalk();
$Talker->smallTalk();
$Talker->ramenTalk();
// $Talker->kinnikuTalk();	// private なのでエラーになる
echo '</pre>';
**/

?>
