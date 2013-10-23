<?php

function TrueF() {
	return true;
}
function FalseF() {
	return false;
}

var_dump(empty(TrueF()));
var_dump(empty(FalseF()));

?>
