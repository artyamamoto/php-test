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
</style>
</head>
<body>
	<input type="button" value="メニュー再読み込み" onclick="location.reload();" />
	<p>your php version is <?= phpversion() ?></p>
<?php
function h($s) {
	return htmlspecialchars($s, ENT_QUOTES);
}
function pr($s) {
	echo '<pre>',h(print_r($s,true)),'</pre>';
}

	$versions = glob('php5.*');
	sort($versions);
?>
	<ul>
	<? foreach($versions as $php) : 
			$list = glob("$php/*.php");
			sort($list);
		?>
		<li>
			<h3><?= h($php) ?></h3>
			<ul>
				<? foreach($list as $s): 
						$s = substr($s, 0,-4);
				?>
					<li><a target="main" href="main.php?source=<?= $s ?>"><?= basename($s) ?></a></li>
				<? endforeach; ?>
			</ul>
		</li>
	<?  endforeach; ?>
	</ul>	
</body>
</html>
