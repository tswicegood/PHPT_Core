--TEST--
If PHPT_Section_INI is instantiated with no $data and a php.ini exists
in the same directory as the PHPT_Case, use that file
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$random = "some random integer: " . rand(100, 200);
file_put_contents(
    dirname(__FILE__) . '/php.ini',
    "foobar={$random}"
);

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/some-test-case.phpt';

$ini = new PHPT_Section_INI();
$ini->run($case);

assert('isset($ini->data["foobar"])');
assert('$ini->data["foobar"] == $random');

?>
===DONE===
--CLEAN--
<?php 
unlink(dirname(__FILE__) . '/php.ini'); 
?>
--EXPECT--
===DONE===


