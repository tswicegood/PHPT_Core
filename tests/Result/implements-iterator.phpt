--TEST--
Domain51_Test_Result implements an Iterator interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('Domain51_Test_Result');
assert('$reflection->implementsInterface("Iterator")');

?>
===DONE===
--EXPECT--
===DONE===