--TEST--
PHPT_Case::$output is null at instantiation
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$case = new PHPT_Case(new PHPT_SectionList());
assert('is_null($case->output)');

?>
===DONE===
--EXPECT--
===DONE===
