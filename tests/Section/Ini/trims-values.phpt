--TEST--
Any whitespace in the value is trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$ini_data = "key=  has two spaces at front and one tab at end of key\t";
$ini = new PHPT_Section_Ini($ini_data);
assert('$ini->data["key"] == "has two spaces at front and one tab at end of key"');

?>
===DONE===
--EXPECT--
===DONE===
