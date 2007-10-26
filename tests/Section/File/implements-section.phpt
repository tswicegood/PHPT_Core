--TEST--
PHPT_Section_FILE implements PHPT_Section
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_FILE('');
assert('$section instanceof PHPT_Section');

?>
===DONE===
--EXPECT--
===DONE===
