<?php
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
class MishimaYukio extends Person {
	public static function who() {
		echo __CLASS__,"\n";
	}
}

echo '<pre>';
echo "MishimaYukio::getStatic() : " , MishimaYukio::getStatic() , "\n";
echo "MishimaYukio::getSelf() : " , MishimaYukio::getSelf() , "\n";
echo '</pre>';
?>
