--TEST--
Null assertion is named assertNull
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new PHPT_Assert_Null(null);
assert('$assertion->getName() == "assertNull"');

?>
===DONE===
--EXPECT--
===DONE===
