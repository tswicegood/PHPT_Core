--TEST--
If PHPT_Case::is() is provided with a string, it will be appended to "PHPT_Case_Validator_"
to attempt to find a validator to use.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class PHPT_Case_Validator_Foobar implements PHPT_Case_Validator {
    public function validate(PHPT_Case $case) { }
    public function is(PHPT_Case $case) {
        echo __METHOD__ . " was called\n";
    }
}

$case = new PHPT_Case(new PHPT_SectionList());
$case->is('Foobar');

?>
===DONE===
--EXPECT--
PHPT_Case_Validator_Foobar::is was called
===DONE===