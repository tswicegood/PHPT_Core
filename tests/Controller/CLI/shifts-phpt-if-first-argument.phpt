--TEST--
If the first option has a basename of 'phpt', it will be pulled from the stack
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$options = array(
    '/path/to/phpt',
    dirname(__FILE__) . '/../../../tests-supporting/tests',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECT--
PHPT Test Runner v0.1

..

Test Cases Run: 2, Passes: 2, Failures: 0, Skipped: 0
===DONE===
