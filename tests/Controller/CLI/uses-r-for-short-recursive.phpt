--TEST--
If "r" is present, use it just like "recursive"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$options = array(
    '-r',
    dirname(__FILE__) . '/../../../tests-supporting/tests',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECTREGEX--
.*Test Cases Run: 5, Passes: 5, Failures: 0, Errors: 0, Skipped: 0.*
===DONE===
