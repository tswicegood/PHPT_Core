--TEST--
If a Case->sections does not contain a TEST section, a
PHPT_Exception_InvalidCaseException will be thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$file = new PHPT_Section_File('foobar');
$file->filename = dirname(__FILE__) . '/fake-test-case.php';

$sections = new PHPT_SectionList(array($file));

$case = new PHPT_Case($sections);
$validator = new PHPT_Case_Validator_Runnable();

try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (PHPT_Exception_InvalidCaseException $e) {
    assert('$e->getMessage() == "missing TEST section"');
}

?>
===DONE===
--EXPECT--
===DONE===
