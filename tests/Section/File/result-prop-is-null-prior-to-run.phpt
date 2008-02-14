--TEST--
PHPT_Section_FILE->result is null when instantiated
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_FILE('');
assert('is_null($section->result)');

?>
===DONE===
--EXPECT--
===DONE===

