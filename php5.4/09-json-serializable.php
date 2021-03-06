<?php
/**
 * ジキルの名前はジキルですが、json_encodeするとハイドになります。
 *
 * JsonSerializable をimplements し、jsonSerialize() メソッドを
 * オーバーライドすると、json_encodeする時の内容を指定することが可能です。
 */

class Jekyll implements JsonSerializable {
    public $name = "";
    public function __construct() {
        $this->name = "Jekyll";
    }
    public function jsonSerialize() {
        return array("name" => "Hide");
    }
}

$jekyll = new Jekyll();
var_dump($jekyll);
var_dump(json_encode(new Jekyll()));
?>