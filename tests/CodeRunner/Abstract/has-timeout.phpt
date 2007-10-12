--TEST--
Has a public $timeout property
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Driver_Abstract');
assert('$reflection->hasProperty("timeout")');
assert('$reflection->getProperty("timeout")->isPublic()');

?>
===DONE===
--EXPECT--
===DONE===
