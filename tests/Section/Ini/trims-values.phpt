--TEST--
Any whitespace in the value is trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$ini_data = "key=  has two spaces at front and one tab at end of key\t";
$ini = new PHPT_Section_INI($ini_data);
$ini->run(new PHPT_SimpleTestCase());

assert('$ini->data["key"] == "has two spaces at front and one tab at end of key"');

?>
===DONE===
--EXPECT--
===DONE===
