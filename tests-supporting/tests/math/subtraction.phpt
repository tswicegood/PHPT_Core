--TEST--
PHP is capable of basic subtraction
--FILE--
<?php

$a = 10;
$b = 5;

$result = $a - $b;
echo $result, PHP_EOL;

?>
===DONE===
--EXPECT--
5
===DONE===
