--TEST--
PHPT_Case_Validator_CgiRequired implements PHPT_Case_Validator
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$validator = new PHPT_Case_Validator_CgiRequired();
assert('$validator instanceof PHPT_Case_Validator');

?>
===DONE===
--EXPECT--
===DONE===