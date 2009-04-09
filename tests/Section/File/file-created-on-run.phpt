--TEST--
A file is created based on the Case's $filename property on run()
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.phpt';

$code = 'Hello World';

$file = new PHPT_Section_FILE($code);

$expected_file = dirname(__FILE__). '/fake-test-case.php';
assert('file_exists($expected_file) == false');
$file->run($case);
assert('file_exists($expected_file) == true');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/fake-test-case.phpt.php'); ?>
--EXPECT--
===DONE===
