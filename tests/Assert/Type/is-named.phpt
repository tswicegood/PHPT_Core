--TEST--
Type assertion is named assertType
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new PHPT_Assert_Type('bool', true);
assert('$assertion->getName() == "assertType"');

?>
===DONE===
--EXPECT--
===DONE===
