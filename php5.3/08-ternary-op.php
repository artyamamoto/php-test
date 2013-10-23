<?php
	$s1 = "This is a Condition.";
	$s2 = "This is a Value.";
	
	var_dump(($s1 ? $s2 : false) );
	var_dump(($s1 ? $s1 : false) );
	var_dump(($s1 ?: false) );
?>
