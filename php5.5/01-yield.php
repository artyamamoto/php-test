<?php
class Messages {
	public $list = array(
		"PHP" => "早い",
		"Perl" => "コマンド向け",
		"Python" => "インデント", 
		"Ruby" => "よくわからん",
		"Javascript" => "楽しい",
		"Java" => "面倒",
		"C/C++" => "すごく面倒",
	);
	public function fetch() {
		$keys = array_keys($this->list);
		while($k = array_shift($keys)) {
			echo " - yield $k => \$this->list[$k]\n";
			yield $k => $this->list[$k];
		}
	}
}

foreach((new Messages())->fetch() as $k => $v) {
	echo "<table border='1'><tr>";
	echo "<th>$k</th>";
	echo "<td>$v</td>";
	echo "</tr></table>";
	echo '<br /><br /><br />';
}

?>
