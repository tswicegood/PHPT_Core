--TEST--
Run with --quick flag
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.phpt';
// break up like this so the parser doesn't think its found another test
$case = '--TEST--' . PHP_EOL
        . 'foobar' . PHP_EOL
        . '--FILE--' . PHP_EOL
        . '<?php' . PHP_EOL
        . 'echo getmypid(), PHP_EOL;' . PHP_EOL
        . '?>' . PHP_EOL
        . '===DONE===' . PHP_EOL
        . '--EXPECT--' . PHP_EOL
        . getmypid() . PHP_EOL
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
--EXPECTREGEX--
/.*Test Cases Run: 1, Passes: 1, Failures: 0, Errors: 0, Skipped: 0.*/
===DONE===
