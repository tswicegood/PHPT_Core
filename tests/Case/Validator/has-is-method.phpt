--TEST--
Has a is() method
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Case_Validator');
assert('$reflection->hasMethod("is")');

?>
===DONE===
--EXPECT--
===DONE===
