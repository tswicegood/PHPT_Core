--TEST--
If a Case->sections does not contain a FILE section, a
Domain51_Test_Exception_InvalidCaseException will be thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$sections = new Domain51_Test_SectionList(array(
    new Domain51_Test_Section_Test('foobar')
));

$case = new Domain51_Test_Case($sections);
$validator = new Domain51_Test_Case_Validator();

try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (Domain51_Test_Exception_InvalidCaseException $e) {
    assert('$e->getMessage() == "missing FILE section"');
}

?>
===DONE===
--EXPECT--
===DONE===