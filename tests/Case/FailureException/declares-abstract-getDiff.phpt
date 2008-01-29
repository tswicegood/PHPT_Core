--TEST--
PHPT_Case_FailureException declares a getReason() method as an abstract
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Case_FailureException');
assert('$reflection->hasMethod("getReason")');
assert('$reflection->getMethod("getReason")->isAbstract()');

?>
===DONE===
--EXPECT--
===DONE===
