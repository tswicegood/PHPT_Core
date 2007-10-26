--TEST--
PHPT_Section_EXPECTREGEX_UnexpectedOutputException is a subclass of PHPT_Case_FailureException
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_EXPECTREGEX_UnexpectedOutputException');
assert('$reflection->isSubClassof("PHPT_Case_FailureException")');

?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
