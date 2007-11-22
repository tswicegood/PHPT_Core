--TEST--
Properly reports failures
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$options = array(
    dirname(__FILE__) . '/../../../tests-supporting/tests-failures',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECTF--
PHPT Test Runner v%f%s

F.

Failed Cases:
    %s/tests-failures/01-fails.phpt%s
        001- passes
        001+ fails

Test Cases Run: 2, Passes: 1, Failures: 1, Skipped: 0
Total Test Time: %d:%d
===DONE===
