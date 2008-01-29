--TEST--
PHP is capable of basic division
--FILE--
<?php

$a = 10;
$b = 2;

$result = $a / $b;
echo $result, "\n";

?>
===DONE===
--EXPECT--
5
===DONE===
