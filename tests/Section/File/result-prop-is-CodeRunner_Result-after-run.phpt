--TEST--
After FILE::run() is called, FILE->result will be an instance of PHPT_CodeRunner_Result
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.phpt';

$section = new PHPT_Section_FILE('');
$section->run($case);

assert('$section->result instanceof PHPT_CodeRunner_Result');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/fake-test-case.phpt.php'); ?>
--EXPECT--
===DONE===

