--TEST--
PHPT_CodeRunner_Driver_WScriptShell extends PHPT_CodeRunner_Driver_Abstract
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Driver_WScriptShell');
assert('$reflection->getParentClass()->getName() == "PHPT_CodeRunner_Driver_Abstract"');

?>
===DONE===
--EXPECT--
===DONE===
