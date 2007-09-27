--TEST--
Throws an exception with %f and no decimals
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = 'this string contains no floats';

$section = new Domain51_Test_Section_Expectf('%f');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (Domain51_Test_Section_Expectf_UnexpectedOutputException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===