<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
        body {
            font-size:	13px;
            color:		#000;
        }
        h1,h2,h3,h4,h5,h6 {
            font-size:		16px;
            font-weight:	bold;
            margin:			0 auto 8px;
        }
        a, a:link, a:visited {
            color:		#00f;
        }
        .source {
            border:		1px solid #000;
            overflow:   auto;
        }
        .result {
            border:		1px solid #000;
            overflow:   auto;
        }
        <?= join(",",array_map(function($i){return ".result h$i";},range(1,6))) ?>{
        }
        .result h3 {
            font-size:      20px;
            padding:        8px;
            background:      #ccc;
        }
        .result h4 {
            font-size:      15px;
            padding:        8px;
            color:      #99f;
        }
        .result h5 { font-size: 12px; padding-left: 10px ; }
        .result h6 { font-size: 12px; padding-left: 12px ; }

        td , th {
            vertical-align:		top;
            text-align: left;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
        jQuery(function($) {
            var f = function() {
                var w0 = $(window).width();
                var h0 = $(window).height();

                $(".source, .result").each(function() {
                    var $this = $(this);
                    var h1 = h0 - $this.offset().top - 12;

                    $this.css("max-height" , h1 + "px")
                });
            };
            f();
            $(window).bind("resize",f);
        });
    </script>
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
