--TEST--
Domain51_Test_Section_Expect will throw a
Domain51_Test_Section_Expect_UnexpectedOutputException when the data
it is instantiated with does not match the $output property of the
provided Domain51_Test_Case object.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = rand(100, 200);

$expect = new Domain51_Test_Section_Expect(rand(1000, 2000));
try {
    $expect->run($case);
    trigger_error('exception not caught');
} catch (Domain51_Test_Section_Expect_UnexpectedOutputException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===