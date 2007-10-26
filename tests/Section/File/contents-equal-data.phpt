--TEST--
PHPT_Section_FILE::$contents is equal to whatever the $data was at instantiation
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = 'Random Int: ' . rand(100, 200);
$section = new PHPT_Section_FILE($random);
assert('$section->contents == $random');

?>
===DONE===
--EXPECT--
===DONE===
