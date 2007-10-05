--TEST--
Has a public $environment property
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Abstract');
assert('$reflection->hasProperty("environment")');
assert('$reflection->getProperty("environment")->isPublic()');

?>
===DONE===
--EXPECT--
===DONE===