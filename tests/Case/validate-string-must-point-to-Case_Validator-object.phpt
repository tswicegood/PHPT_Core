--TEST--
When a string is used or PHPT_Case::validate(), it must point to an object that implements
PHPT_Case_Validator
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class PHPT_Case_Validator_Foobar {
    public function validate() { }
}

$case = new PHPT_Case(new PHPT_SectionList());
$case->validate('Foobar');

?>
===DONE===
--EXPECTREGEX--
.*\$validator instanceof PHPT_Case_Validator.*
===DONE===