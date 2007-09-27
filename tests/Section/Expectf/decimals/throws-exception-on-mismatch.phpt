--TEST--
Throws an exception with %d and no decimals
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = 'this string contains no decimals';

$section = new Domain51_Test_Section_Expectf('%d');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (Domain51_Test_Section_Expectf_UnexpectedOutputException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===