<?php

function passwd($len=12) {
	$s = "";
	for($i=$len;$i>0;$i--) 
		$s .= "0123456789"[mt_rand(0,9)];
	return $s;
}
var_dump(passwd());

function passwd2($len=12) {
	$s = "";
	for($i=$len;$i>0;$i--) 
		$s .= [0,1,2,3,4,5,6,7,8,9][mt_rand(0,9)];
	return $s;

}
var_dump(passwd2());
?>
