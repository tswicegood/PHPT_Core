--TEST--
PHPT_Section_Expectregex will throw a
PHPT_Section_Expectregex_UnexpectedOutputException when the data
it is instantiated with does not match the $output property of the
provided PHPT_Case object.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = '';
// set filename in mock as some PHP installs won't allow writing to files beginning with a period
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$pattern = '/.{1}/';
$expect = new PHPT_Section_Expectregex($pattern);
try {
    $expect->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_Expectregex_UnexpectedOutputException $e) {
    
}

?>
===DONE===
--CLEAN--
<?php include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
