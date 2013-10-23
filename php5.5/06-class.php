<?php
namespace test1\test1;
class Sample {}

namespace main;
use \test1\test1;

echo \test1\test1\Sample::class;


?>
