--TEST--
Matches a basic hex value

@todo suppliment this test with additional tests for more "hex" values
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = '0129AF';
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$section = new PHPT_Section_EXPECTF('%x');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===
