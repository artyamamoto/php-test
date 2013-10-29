<?php
	$s1 = "文字列１";
	$s2 = "文字列２";

    echo '<pre>';
	echo '($s1 ? $s2 : false) == ';
        var_dump(($s1 ? $s2 : false) );
    echo "\n";
    echo '($s1 ?: false) == ';
        var_dump(($s1 ?: false) );
    echo "\n";
    echo '</pre>';
?>
