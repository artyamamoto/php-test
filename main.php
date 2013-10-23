<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
	body {
		font-size:	12px;
		color:		#000;
	}
	h1,h2,h3,h4,h5,h6 {
		font-size:		16px;
		font-weight:	bold;
		margin:			0;	
	}
	a, a:link, a:visited {
		color:		#00f;
	}
	.source {
		border:		1px solid #000;
	}
	.result {
		border:		1px solid #000;
	}
	td , th {
		vertical-align:		top;
	}
</style>
</head>
<body>
<?php
ini_set('display_errors',true);
function h($s) {
	return htmlspecialchars($s, ENT_QUOTES);
}
function pr($s) {
	echo '<pre>',h(print_r($s,true)),'</pre>';
}

	$source = null;
	if (isset($_GET["source"])) {
		if (preg_match('/^[0-9a-zA-Z\.\-\/]+$/', $_GET["source"])) {
			$tmp = sprintf('%s/%s.php',dirname(__FILE__), $_GET["source"]);
			if (is_file($tmp)) 
				$source = $tmp;
		}
	}
?>
<? if (!empty($source)) :  ?>
	<h1><?= h($_GET["source"]) ?></h1>
	<table style="width: 100%;">
	<tr><td style="width: 50%;">
		<h2>Source</h2>
		<div class="source">
			<? highlight_file($source);  ?>
		</div>
	</td><td style="width: 50%;">
		<h2>Result</h2>
		<div class="result">
			<? include $source; ?>
		</div>
	</td></tr></table>
<? endif; ?>
</body>
</html>
