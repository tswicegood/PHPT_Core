--TEST--
Run with --recursive flag
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$options = array(
    '--recursive',
    dirname(__FILE__) . '/../../../tests-supporting/tests',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECTF--
PHPT Test Runner v%f%s

.....

Test Cases Run: 5, Passes: 5, Failures: 0, Skipped: 0
===DONE===
