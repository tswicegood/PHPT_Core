--TEST--
If a Case->sections does not contain a TEST section, a
PHPT_Case_InvalidCaseException will be thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$file = new PHPT_Section_FILE('foobar');
$file->filename = dirname(__FILE__) . '/fake-test-case.phpt';

$sections = new PHPT_SectionList(array($file));

$case = new PHPT_Case($sections, dirname(__FILE__) . '/fake-test-case.phpt');
$validator = new PHPT_Case_Validator_Runnable();

try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_InvalidCaseException $e) {
    assert('$e->getMessage() == "missing TEST section"');
}

?>
===DONE===
--EXPECT--
===DONE===
