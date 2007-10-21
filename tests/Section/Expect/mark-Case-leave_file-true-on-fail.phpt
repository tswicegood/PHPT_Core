--TEST--
If PHPT_Section_Expect fails, mark Case->leave_file as true
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';
$case->output = "foobar";

// sanity check
assert('$case->laeve_file == false');

$expect = new PHPT_Section_Expect('barfoo');
try {
    $expect->run($case);
} catch (PHPT_Section_Expect_UnexpectedOutputException $e) {
    
}

assert('$case->leave_file == true');

?>
===DONE===
--CLEAN--
<?php include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
