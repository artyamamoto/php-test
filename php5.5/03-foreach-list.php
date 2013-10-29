<?php
/*
 * foreach の変数の受取側でlist()構文が使える
 */
$ar = [
	[1,2,3], 
	[4,5,6] ,
	[7,8,9],
];
foreach($ar as list($a,$b,$c)) {
	echo join(",",[$c,$b,$a]),"<br />";
}

?>
