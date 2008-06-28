--TEST--
PHP is capable of basic division
--FILE--
<?php

$a = 10;
$b = 2;

$result = $a / $b;
echo $result, PHP_EOL;

?>
===DONE===
--EXPECT--
5
===DONE===
