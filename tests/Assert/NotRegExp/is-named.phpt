--TEST--
NotRegExp assertion is named assertNotRegExp
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new Domain51_Test_Assert_NotRegExp('/.+/', '');
assert('$assertion->getName() == "assertNotRegExp"');

?>
===DONE===
--EXPECT--
===DONE===