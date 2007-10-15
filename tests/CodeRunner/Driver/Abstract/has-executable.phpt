--TEST--
Has a public $executable property
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Driver_Abstract');
assert('$reflection->hasProperty("executable")');
assert('$reflection->getProperty("executable")->isPublic()');

?>
===DONE===
--EXPECT--
===DONE===
