<?php
//=== trait ===========
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
//=== Deamon ================
class Deamon {
	public function curse() {
		echo __METHOD__, "\n";
	}
}
//=== Kogure =================
class Kogure extends Deamon  {
	use Singleton;
	
	public function sing() {
		echo __METHOD__,"\n";
	}
}

echo "<pre>";

$Kogure = Kogure::getInstance();
$Kogure->curse();
$Kogure->sing();


echo "</pre>";

?>
