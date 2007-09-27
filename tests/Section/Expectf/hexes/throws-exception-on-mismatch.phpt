--TEST--
Throws an exception if no "hex" characters are found within the string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = 'zyx';
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$expect = new Domain51_Test_Section_Expectf('%x');
try {
    $expect->run($case);
    trigger_error('exception not caught');
} catch (Domain51_Test_Section_Expectf_UnexpectedOutputException $e) {
    
}

?>
===DONE===
--CLEAN--
<?php
$path = dirname(__FILE__);
include "{$path}/../_clean.inc";
?>
--EXPECT--
===DONE===