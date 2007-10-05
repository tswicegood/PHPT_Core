--TEST--
Has a public $filename property
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Abstract');
assert('$reflection->hasProperty("filename")');
assert('$reflection->getProperty("filename")->isPublic()');

?>
===DONE===
--EXPECT--
===DONE===