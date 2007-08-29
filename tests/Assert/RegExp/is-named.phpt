--TEST--
RegExp assertion is named assertRegExp
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new Domain51_Test_Assert_RegExp('/.*/', '123');
assert('$assertion->getName() == "assertRegExp"');

?>
===DONE===
--EXPECT--
===DONE===