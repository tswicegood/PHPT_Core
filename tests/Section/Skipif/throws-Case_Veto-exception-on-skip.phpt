--TEST--
If the first four characters in the returned value of $data is equal to
"skip", then a Domain51_Test_Case_VetoException will be thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$section = new Domain51_Test_Section_Skipif('skip');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (Domain51_Test_Case_VetoException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===