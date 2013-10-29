<?php
//=== 変数に関数を代入する ===========
echo "<h3>変数に無名関数を代入する</h3>";
$mul = function($a,$b) {
	return ($a * $b);
};
echo $mul(3,4),"<br />";

//=== 関数を直接、コールバックとして利用する。
echo "<h3>関数をコールバック引数とする</h3>";
$ar = array_map(function($i) {
    return sqrt($i);
},range(0,100));

echo '<pre>';
print_r($ar);
echo '</pre>';
?>
