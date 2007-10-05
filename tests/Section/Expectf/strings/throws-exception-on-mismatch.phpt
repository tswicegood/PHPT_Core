--TEST--
Throws an exception if no characters are found within the output
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = '';
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$expect = new PHPT_Section_Expectf('%s');
try {
    $expect->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_Expectf_UnexpectedOutputException $e) {
    
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
