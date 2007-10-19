--TEST--
PHPT_CodeRunner_Driver_OutputBuffer is an instanceof PHPT_CodeRunner_Driver_Abstract
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_OutputBuffer($caller);
assert('$runner instanceof PHPT_CodeRunner_Driver_Abstract');

?>
===DONE===
--EXPECT--
===DONE===