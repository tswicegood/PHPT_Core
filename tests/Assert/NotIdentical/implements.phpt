--TEST--
PHPT_Assert_NotIdentical implements PHPT_Assertion
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('PHPT_Assert_NotIdentical');
assert('$reflection->implementsInterface("PHPT_Assertion")');

?>
===DONE===
--EXPECT--
===DONE===
