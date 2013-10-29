<?php
/*
 * 以下のような形で配列や文字列リテラルに直接[添字]をつけて参照することが可能です。
 *  "123"[0]
 *  [1,2,3][0]
 *
 */

function passwd($len=12) {
	$s = "";
	for($i=$len;$i>0;$i--) 
		$s .= "0123456789"[mt_rand(0,9)];
	return $s;
}

function passwd2($len=12) {
	$s = "";
	for($i=$len;$i>0;$i--) 
		$s .= [0,1,2,3,4,5,6,7,8,9][mt_rand(0,9)];
	return $s;

}
echo "<pre>";
var_dump(passwd());
var_dump(passwd2());
echo "</pre>";
?>
