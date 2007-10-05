--TEST--
PHPT_Assert_NotEqual implements PHPT_Assertion
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('PHPT_Assert_NotEqual');
assert('$reflection->implementsInterface("PHPT_Assertion")');

?>
===DONE===
--EXPECT--
===DONE===
