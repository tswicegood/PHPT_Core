--TEST--
PHPT_Section_TEST can be cast to a string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$str = 'Random Int: ' . rand(100, 200);
$section = new PHPT_Section_TEST($str);
assert('(string)$section == $str');

?>
===DONE===
--EXPECT--
===DONE===
