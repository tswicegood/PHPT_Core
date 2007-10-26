--TEST--
Should match when an integer is within a string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = "text with 123 inside";
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$section = new PHPT_Section_EXPECTF("text with %i inside");
$section->run($case);

?>
===DONE===
--CLEAN--
<?php
$path = dirname(__FILE__);
include "{$path}/../_clean.inc";
?>
--EXPECT--
===DONE===
