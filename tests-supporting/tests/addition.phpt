--TEST--
Simple addition
--FILE--
<?php

$a = 1;
$b = 2;
$c = 3;

$d = $a + $b + $c;
echo $d, PHP_EOL;

?>
===DONE===
--EXPECT--
6
===DONE===
