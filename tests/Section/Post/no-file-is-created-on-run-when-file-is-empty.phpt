--TEST--
If $file is empty, no file is created when run() is invoked
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$post = new Domain51_Test_Section_Post();

$before_run = scandir(dirname(__FILE__));
$post->run($case);
$after_run = scandir(dirname(__FILE__));

assert('$before_run == $after_run');

?>
===DONE===
--EXPECT--
===DONE===