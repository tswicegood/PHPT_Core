--TEST--
PHPT_Case_Validator_Runnable implements PHPT_Case_Validator
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Case_Validator_Runnable');
assert('$reflection->implementsInterface("PHPT_Case_Validator")');

?>
===DONE===
--EXPECT--
===DONE===
