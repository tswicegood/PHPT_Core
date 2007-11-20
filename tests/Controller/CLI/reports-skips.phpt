--TEST--
Properly reports skips
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$options = array(
    dirname(__FILE__) . '/../../../tests-supporting/tests-skips',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECTF--
PHPT Test Runner v%f%s

S.

Skipped Cases:
    %s/tests-skips/01-skips.phpt -%s

Test Cases Run: 2, Passes: 1, Failures: 0, Skipped: 1
===DONE===
