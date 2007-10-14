--TEST--
Throws an exception with %f and no decimals
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = 'this string contains no floats';
$case->filename = dirname(__FILE__) . '/fake-test-case.phpt';

$section = new PHPT_Section_Expectf('%f');
try {
    $section->run($case);
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
