<?php
trait Kinnikuman {
	public function bigTalk() { echo __METHOD__,"\n"; }
	public function smallTalk() { echo __METHOD__,"\n"; }
}
trait Ramenman {
	public function bigTalk() { echo __METHOD__,"\n"; }
	public function smallTalk() { echo __METHOD__,"\n"; }
}
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


?>
