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
--EXPECTREGEX--
/.*
Skipped Cases:
    .*tests-skips\/01-skips.phpt - because it always does
    .*tests-skips\/03-preskips.phpt - didn't see the ini setting

Test Cases Run: 3, Passes: 1, Failures: 0, Errors: 0, Skipped: 2.*/
===DONE===
