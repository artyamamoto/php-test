<?php
/*
 * new で生成したインスタンスのメソッドを (new Class())->hoge() という形で呼び出せます。
 */
class Database {
	function init() {
		echo __METHOD__," called\n";
		return $this;
	}
	function select() {
		echo __METHOD__," called\n";
		return $this;
	}
	function where() {
		echo __METHOD__," called\n";
		return $this;
	}
	function order() {
		echo __METHOD__," called\n";
		return $this;
	}
	function limit() {
		echo __METHOD__," called\n";
		return $this;
	}
	function exec() {
		echo __METHOD__," called\n";
		return "This is Result";
	}
}
echo "<pre>";
$val = (new Database())
		->select()
		->where("hoge = ?")
		->order()
		->limit()
		->exec();
var_dump($val);
echo "</pre>";
?>
