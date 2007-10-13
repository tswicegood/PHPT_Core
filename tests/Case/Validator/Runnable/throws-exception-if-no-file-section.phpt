--TEST--
If a Case->sections does not contain a FILE section, a
PHPT_Case_InvalidCaseException will be thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$sections = new PHPT_SectionList(array(
    new PHPT_Section_Test('foobar')
));

$case = new PHPT_Case($sections, dirname(__FILE__) . '/fake-test-case.phpt');
$validator = new PHPT_Case_Validator_Runnable();

try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_InvalidCaseException $e) {
    assert('$e->getMessage() == "missing FILE section"');
}

?>
===DONE===
--EXPECT--
===DONE===
