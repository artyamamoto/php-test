<?php
//=== 変数に関数を代入する ===========
$mul = function($a,$b) {
	return ($a * $b);
};
echo $mul(3,4),"<br />";

//=== 関数を直接、コールバックとして利用する。
$ar = range(1,10);
array_walk($ar, function($v,$k) {
	printf("%s: %s<br />", htmlspecialchars($k),htmlspecialchars($v));
});

?>
