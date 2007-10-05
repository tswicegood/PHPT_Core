--TEST--
PHPT_Case::validate() will call validate() on the provided object
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class FooBarValidator implements PHPT_Case_Validator {
    public function validate(PHPT_Case $case) {
        echo __METHOD__ . " was called\n";
    }
    
    public function is(PHPT_Case $case) { }
}

$case = new PHPT_Case(new PHPT_SectionList());
$case->validate(new FooBarValidator());

?>
===DONE===
--EXPECT--
FooBarValidator::validate was called
===DONE===