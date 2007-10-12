--TEST--
Has a validate() method
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Case_Validator');
assert('$reflection->hasMethod("validate")');

?>
===DONE===
--EXPECT--
===DONE===
