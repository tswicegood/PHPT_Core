--TEST--
PHPT_Case_Validator_OutputBufferCompatible implements PHPT_Case_Validator
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$instance = new PHPT_Case_Validator_OutputBufferCompatible();
assert('$instance instanceof PHPT_Case_Validator');

?>
===DONE===
--EXPECT--
===DONE===
