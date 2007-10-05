--TEST--
If $file is empty, no file is created when run() is invoked
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$post = new PHPT_Section_Post();

$before_run = scandir(dirname(__FILE__));
$post->run($case);
$after_run = scandir(dirname(__FILE__));

assert('$before_run == $after_run');

?>
===DONE===
--EXPECT--
===DONE===
