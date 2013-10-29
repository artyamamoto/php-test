<?php
/*
 * php5.4 までempty() は（関数ではなく構文なので）変数以外を入れることは
 * できませんでしたが、php5.5からは関数や式などを指定できます。
 */

function TrueF() {
	return true;
}
function FalseF() {
	return false;
}

echo '<pre>';
var_dump(empty(TrueF()));
var_dump(empty($tmp = FalseF()));
echo '</pre>';

?>
