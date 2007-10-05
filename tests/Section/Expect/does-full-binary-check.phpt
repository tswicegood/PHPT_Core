--TEST--
Does a full binary check to insure the output is actually the same
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = '1';
// set filename in mock as some PHP installs won't allow writing to files beginning with a period
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$expect = new PHPT_Section_Expect('1');
$expect->run($case);
// nothing happens

$expect = new PHPT_Section_Expect('01');
try {
    $expect->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_Expect_UnexpectedOutputException $e) {
    
}
?>
===DONE===
--CLEAN--
<?php include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
