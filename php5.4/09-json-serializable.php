<?php

class Jekyll implements JsonSerializable {
    public $name = "";
    public function __construct() {
        $this->name = "Jekyll";
    }
    public function jsonSerialize() {
        //return new Ghost("ミカエル");
        return array("name" => "Hide");
    }
}

print_r(json_decode(json_encode(new Jekyll())));
?>