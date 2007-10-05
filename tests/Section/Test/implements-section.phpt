--TEST--
PHPT_Section_Test implements PHPT_Section
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_Test('');
assert('$section instanceof PHPT_Section');

?>
===DONE===
--EXPECT--
===DONE===
