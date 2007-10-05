--TEST--
If the FILE->filename property is empty in the provide Case's sections property
a PHPT_Exception_InvalidCaseException will be thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_Test('foobar'),
        new PHPT_Section_File('foobar'),
    ))
);
$validator = new PHPT_Case_Validator_Runnable();
assert('$validator->is($case) == false');

?>
===DONE===
--EXPECT--
===DONE===
