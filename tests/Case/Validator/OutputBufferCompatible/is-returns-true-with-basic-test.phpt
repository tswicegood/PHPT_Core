--TEST--
If a basic TEST, FILE, EXPECT test is present in the provided Case, is() returns true
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_TEST('foobar'),
        new PHPT_Section_FILE('foobar'),
        new PHPT_Section_EXPECT('foobar'),
    )),
    dirname(__FILE__) . '/foobar.phpt'
);

$validator = new PHPT_Case_Validator_OutputBufferCompatible();
assert('$validator->is($case)');

?>
===DONE===
--EXPECT--
===DONE===
