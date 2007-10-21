--TEST--
PHPT_CodeRunner_Driver_OutputBuffer::validate() always returns null and does nothing as
output bufferring is always capable of happening
--FILE--
<?php

require_once dirname(__FILE__). '/../../../_setup.inc';

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_OutputBuffer($caller);
assert('$runner->validate() == null');

?>
===DONE===
--EXPECT--
===DONE===
