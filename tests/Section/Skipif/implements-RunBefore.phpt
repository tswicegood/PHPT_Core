--TEST--
Domain51_Test_Section_Skipif implements Domain51_Test_Section_RunBefore 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new Domain51_Test_Section_Skipif('');
assert('$section instanceof Domain51_Test_Section_RunBefore');

?>
===DONE===
--EXPECT--
===DONE===