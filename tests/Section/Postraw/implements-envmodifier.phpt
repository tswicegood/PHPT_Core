--TEST--
Domain51_Test_Section_Postraw implements Domain51_Test_Section_EnvModifier
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('Domain51_Test_Section_Postraw');
assert('$reflection->implementsInterface("Domain51_Test_Section_EnvModifier")');

?>
===DONE===
--EXPECT--
===DONE===