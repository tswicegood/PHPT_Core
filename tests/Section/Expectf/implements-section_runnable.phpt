--TEST--
Domain51_Test_Section_Expectf implements Domain51_Test_Section_Runnable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new Domain51_Test_Section_Expectf('');
assert('$section instanceof Domain51_Test_Section_Runnable');

?>
===DONE===
--EXPECT--
===DONE===