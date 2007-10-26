--TEST--
No artifacts are left from a successful PHPT_Section_SKIPIF::run()
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$section = new PHPT_Section_SKIPIF('pass');
$directory_before_run = scandir(dirname(__FILE__));
$section->run($case);
$directory_after_run = scandir(dirname(__FILE__));

assert('$directory_before_run == $directory_after_run');

?>
===DONE===
--EXPECT--
===DONE===
