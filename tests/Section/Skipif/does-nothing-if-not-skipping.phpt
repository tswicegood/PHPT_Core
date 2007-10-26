--TEST--
If the first four characters in the $data variable supplied to
Domain5_Test_Section_SKIPIF do not equal 'skip', then nothing happens.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$section = new PHPT_Section_SKIPIF('this will not skip');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===
