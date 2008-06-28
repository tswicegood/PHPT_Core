--TEST--
Can handle tests that run too quickly to get an accurate time on.

This is "tested" by created a test that has no PHP processing invoked so it
should run as fast as possible to run a test.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$str = "--TEST--" . PHP_EOL .
       "simple, fast test" . PHP_EOL .
       "--FILE--" . PHP_EOL .
       "hi!" . PHP_EOL . 
       "--EXPECT--" . PHP_EOL . 
       "hi!";

file_put_contents(dirname(__FILE__) . '/tmp.phpt', $str);


$options = array(
    '/path/to/phpt',
    '--quick',
    dirname(__FILE__) . '/tmp.phpt',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/tmp.phpt'); ?>
--EXPECTREGEX--
/.*Total Test Time: 00:\d{2}.*/
===DONE===
