--TEST--
Domain51_Test_Assert_Equal implements Domain51_Test_Assertion
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

require_once 'Domain51/Test/Assert/Equal.php';
$reflection = new ReflectionClass('Domain51_Test_Assert_Equal');
assert('$reflection->implementsInterface("Domain51_Test_Assertion")');

?>
===DONE===
--EXPECT--
===DONE===