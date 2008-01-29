--TEST--
PHP is capable of basic multiplication
--FILE--
<?php

$a = 2.5;
$b = 2;

$result = $a * $b;
echo $result, "\n";

?>
===DONE===
--EXPECT--
5
===DONE===
