--TEST--
Has a public $stdin property
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Driver_Abstract');
assert('$reflection->hasProperty("stdin")');
assert('$reflection->getProperty("stdin")->isPublic()');

?>
===DONE===
--EXPECT--
===DONE===
