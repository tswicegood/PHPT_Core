--TEST--
Domain51_Test_Section_Test can be cast to a string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$str = 'Random Int: ' . rand(100, 200);
$section = new Domain51_Test_Section_Test($str);
assert('(string)$section == $str');

?>
===DONE===
--EXPECT--
===DONE===