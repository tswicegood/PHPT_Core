--TEST--
Domain51_Test_Section_Expect implements Domain51_Test_Section_Runnable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('Domain51_Test_Section_Expect');
assert('$reflection->implementsInterface("Domain51_Test_Section_Runnable")');

?>
===DONE===
--EXPECT--
===DONE===