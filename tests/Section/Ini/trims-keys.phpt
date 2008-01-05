--TEST--
Any whitespace in the key is trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$ini_data = "  key\t=has two spaces at front and one tab at end of key";
$ini = new PHPT_Section_INI($ini_data);
$ini->run(new PHPT_SimpleTestCase());

assert('$ini->data["key"] == "has two spaces at front and one tab at end of key"');

?>
===DONE===
--EXPECT--
===DONE===
