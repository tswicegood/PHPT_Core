--TEST--
Domain51_Test_Section_Ini implements Domain51_Test_Section
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('Domain51_Test_Section_Ini');
assert('$reflection->implementsInterface("Domain51_Test_Section")');

?>
===DONE===
--EXPECT--
===DONE===