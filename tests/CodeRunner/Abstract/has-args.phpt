--TEST--
Has a public $args property
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Driver_Abstract');
assert('$reflection->hasProperty("args")');
assert('$reflection->getProperty("args")->isPublic()');

?>
===DONE===
--EXPECT--
===DONE===
