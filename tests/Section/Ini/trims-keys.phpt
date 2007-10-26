--TEST--
Any whitespace in the key is trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$ini_data = "  key\t=has two spaces at front and one tab at end of key";
$ini = new PHPT_Section_INI($ini_data);
assert('$ini->data["key"] == "has two spaces at front and one tab at end of key"');

?>
===DONE===
--EXPECT--
===DONE===
