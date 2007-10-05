--TEST--
PHPT_Assert_False implements PHPT_Assertion
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('PHPT_Assert_False');
assert('$reflection->implementsInterface("PHPT_Assertion")');

?>
===DONE===
--EXPECT--
===DONE===
