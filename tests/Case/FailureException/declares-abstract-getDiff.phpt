--TEST--
PHPT_Case_FailureException declares a getDiff() method as an abstract
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Case_FailureException');
assert('$reflection->hasMethod("getDiff")');
assert('$reflection->getMethod("getDiff")->isAbstract()');

?>
===DONE===
--EXPECT--
===DONE===