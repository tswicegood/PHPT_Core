--TEST--
NotIdentical assertion is named assertNotIdentical
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new PHPT_Assert_NotIdentical(123, '123');
assert('$assertion->getName() == "assertNotIdentical"');

?>
===DONE===
--EXPECT--
===DONE===
