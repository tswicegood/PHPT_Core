--TEST--
Has a __toString() method so it can be cast to a string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_CommandLine');
assert('$reflection->hasMethod("__toString")');

?>
===DONE===
--EXPECT--
===DONE===