--TEST--
Domain51_Test_Section_Clean::$filename is the class filename ending in ".clean.php"
instead of ".php"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$random = rand(100, 200);
$case = new Domain51_Test_SimpleTestCase();
$case->filename = dirname(__FILE__) . "/some-random-{$random}-test.php";
$expected_filename = dirname(__FILE__) . "/some-random-{$random}-test.clean.php";

$clean = new Domain51_Test_Section_Clean('foo');
$clean->run($case);

assert('$clean->filename == $expected_filename');

?>
===DONE===
--EXPECT--
===DONE===