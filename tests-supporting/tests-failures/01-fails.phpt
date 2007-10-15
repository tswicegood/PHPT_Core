--TEST--
This is a simple failure
--FILE--
<?php

echo "fails\n";

?>
===DONE===
--EXPECT--
passes
===DONE===