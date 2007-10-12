--TEST--
Has a public $ini property
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Driver_Abstract');
assert('$reflection->hasProperty("ini")');
assert('$reflection->getProperty("ini")->isPublic()');

?>
===DONE===
--EXPECT--
===DONE===
