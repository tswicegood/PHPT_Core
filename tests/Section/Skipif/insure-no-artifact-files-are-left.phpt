--TEST--
No artifacts are left from a successful Domain51_Test_Section_Skipif::run()
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$section = new Domain51_Test_Section_Skipif('pass');
$directory_before_run = scandir(dirname(__FILE__));
$section->run($case);
$directory_after_run = scandir(dirname(__FILE__));

assert('$directory_before_run == $directory_after_run');

?>
===DONE===
--EXPECT--
===DONE===