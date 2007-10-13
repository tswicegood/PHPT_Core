--TEST--
If a Case->sections does not contain a FILE section is() will return false
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$sections = new PHPT_SectionList(array(
    new PHPT_Section_Test('foobar')
));

$case = new PHPT_Case($sections, dirname(__FILE__) . '/fake-test-case.phpt');
$validator = new PHPT_Case_Validator_Runnable();
assert('$validator->is($case) == false');

?>
===DONE===
--EXPECT--
===DONE===
