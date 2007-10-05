--TEST--
If a line in the provided $data contains more than one equal, only the first one is
used for split.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$ini_data = 'message=Contains=multiple equals (=) signs';
$ini = new PHPT_Section_Ini($ini_data);
assert('$ini->data["message"] == "Contains=multiple equals (=) signs"');

?>
===DONE===
--EXPECT--
===DONE===
