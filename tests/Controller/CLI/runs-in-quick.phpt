--TEST--
Run with --quick flag
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.phpt';
// break up like this so the parser doesn't think its found another test
$case = '--TEST--' . "\n"
        . 'foobar' . "\n"
        . '--FILE--' . "\n"
        . '<?php' . "\n"
        . 'echo getmypid(), "\n";' . "\n"
        . '?>' . "\n"
        . '===DONE===' . "\n"
        . '--EXPECT--' . "\n"
        . getmypid() . "\n"
        . '===DONE===';
file_put_contents($filename, $case);

$options = array(
    '--quick',
    dirname(__FILE__) . '/foobar.phpt',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.phpt'); ?>
--EXPECTF--
PHPT Test Runner v%f%s

.

Test Cases Run: 1, Passes: 1, Failures: 0, Skipped: 0
===DONE===
