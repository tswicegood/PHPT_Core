--TEST--
If no path or file is provided as the final argument, us the current working dir
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

chdir(dirname(__FILE__) . '/../../../tests-supporting/tests/');

$controller = new PHPT_Controller_CLI();
$controller->run(array());

?>
===DONE===
--EXPECTREGEX--
/.*Test Cases Run: 2, Passes: 2, Failures: 0, Errors: 0, Skipped: 0.*/
===DONE===
