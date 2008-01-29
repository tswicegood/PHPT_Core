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
--EXPECTREGEX--
.*Test Cases Run: 1, Passes: 1, Failures: 0, Errors: 0, Skipped: 0.*
===DONE===
