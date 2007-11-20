--TEST--
If --quiet is specified but no Quiet reporter exists for the used reporter,
display an error message and use the verbose reporter
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$options = array(
    '--quiet',
    dirname(__FILE__) . '/../../../tests-supporting/tests',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECTF--
Error: No quiet Text reporter available
PHPT Test Runner v%f%s

..

Test Cases Run: 2, Passes: 2, Failures: 0, Skipped: 0
===DONE===
