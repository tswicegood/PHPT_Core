--TEST--
PHPT_Section_Expect will throw a
PHPT_Section_Expect_UnexpectedOutputException when the data
it is instantiated with does not match the $output property of the
provided PHPT_Case object.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = rand(100, 200);
// set filename in mock as some PHP installs won't allow writing to files beginning with a period
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$expect = new PHPT_Section_Expect(rand(1000, 2000));
try {
    $expect->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_Expect_UnexpectedOutputException $e) {
    
}

?>
===DONE===
--CLEAN--
<?php $base = 'fake-test-case'; include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
