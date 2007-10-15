--TEST--
PHPT_Case_FailureException is a subclass of Exception
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Case_FailureException');
assert('$reflection->isSubclassof("Exception")');

?>
===DONE===
--EXPECT--
===DONE===
