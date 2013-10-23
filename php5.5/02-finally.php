<?php
echo "<ol>";
$list = array();
try {
	$list[] = "[Try]\n";
	$list[] = "-> throw new Exception\n";
	throw new Exception("Oops!");
} catch(Exception $e) {
	$list[] = sprintf("[Catch] %s\n" , $e->getMessage());
} finally {
	$list[] = "[Finally]\n";
}

echo join("", array_map(function($v) { return "<li>$v</li>"; }, $list));
echo "</pre>";
?>
