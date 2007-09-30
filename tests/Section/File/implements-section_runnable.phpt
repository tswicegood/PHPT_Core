--TEST--
Domain51_Test_Section_File implements Domain51_Test_Section_Runnable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$file = new Domain51_Test_Section_File('');
assert('$file instanceof Domain51_Test_Section_Runnable');

?>
===DONE===
--EXPECT--
===DONE===