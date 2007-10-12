--TEST--
When a string is used or PHPT_Case::is(), it must point to an object that implements
PHPT_Case_Validator
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class PHPT_Case_Validator_Foobar {
    public function is() { }
}

$case = new PHPT_Case(new PHPT_SectionList());
$case->is('Foobar');

?>
===DONE===
--EXPECTREGEX--
.*\$validator instanceof PHPT_Case_Validator.*
===DONE===
