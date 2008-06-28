--TEST--
This is a simple failure
--FILE--
<?php

echo "fails", PHP_EOL;

?>
===DONE===
--EXPECT--
passes
===DONE===
