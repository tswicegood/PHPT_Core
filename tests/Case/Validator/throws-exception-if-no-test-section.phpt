--TEST--
If a Case->sections does not contain a TEST section, a
Domain51_Test_Exception_InvalidCaseException will be thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$file = new Domain51_Test_Section_File('foobar');
$file->filename = dirname(__FILE__) . '/fake-test-case.php';

$sections = new Domain51_Test_SectionList(array($file));

$case = new Domain51_Test_Case($sections);
$validator = new Domain51_Test_Case_Validator();

try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (Domain51_Test_Exception_InvalidCaseException $e) {
    assert('$e->getMessage() == "missing TEST section"');
}

?>
===DONE===
--EXPECT--
===DONE===