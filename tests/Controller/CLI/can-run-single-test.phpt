--TEST--
If given a real file instead of a path, can run that file
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$options = array(
    dirname(__FILE__) . '/../../../tests-supporting/tests/hello-world.phpt',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECT--
PHPT Test Runner v0.1

.

Test Cases Run: 1, Passes: 1, Failures: 0, Skipped: 0
===DONE===
