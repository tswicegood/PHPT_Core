--TEST--
Should match when a negative float is within a string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = "text with -0.001 inside";
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$section = new Domain51_Test_Section_Expectf("text with %f inside");
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