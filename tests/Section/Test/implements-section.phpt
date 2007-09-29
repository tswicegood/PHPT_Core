--TEST--
Domain51_Test_Section_Test implements Domain51_Test_Section
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new Domain51_Test_Section_Test('');
assert('$section instanceof Domain51_Test_Section');

?>
===DONE===
--EXPECT--
===DONE===