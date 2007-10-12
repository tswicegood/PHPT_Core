--TEST--
If Case->sections contains no CgiExecutable Section objects, validate() throws a
PHPT_Case_InvalidCaseException
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$case = new PHPT_Case(new PHPT_SectionList());
$validator = new PHPT_Case_Validator_CgiRequired();
try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_InvalidCaseException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===
