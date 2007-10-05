--TEST--
When PHPT_Section_Clean::run() is called, a file at the
location specified by the $filename property is created containing the
$data value used at instantiation.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

// sanity check
assert('!file_exists(dirname(__FILE__) . "/foobar.clean.php")');

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.php';

$random = (string)rand(100, 200);
$clean = new PHPT_Section_Clean($random);
$clean->run($case);

assert('trim(file_get_contents(dirname(__FILE__) . "/foobar.clean.php")) == $random');

?>
===DONE===
--EXPECT--
===DONE===
