--TEST--
If a line in the provided $data contains more than one equal, only the first one is
used for split.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$ini_data = 'message=Contains=multiple equals (=) signs';
$ini = new PHPT_Section_INI($ini_data);
$ini->run(new PHPT_SimpleTestCase());

assert('$ini->data["message"] == "Contains=multiple equals (=) signs"');

?>
===DONE===
--EXPECT--
===DONE===
