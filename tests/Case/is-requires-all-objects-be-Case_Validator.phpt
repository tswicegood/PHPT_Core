--TEST--
PHPT_Case::is() requires all objects passed to it be an instanceof PHPT_Case_Validator
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class FooBarValidator {
    public function is() { }
}

$case = new PHPT_Case(new PHPT_SectionList());
$case->is(new FooBarValidator());

?>
===DONE===
--EXPECTREGEX--
.*\$validator instanceof PHPT_Case_Validator.*
===DONE===
