--TEST--
If a readable file is provided as the --INI-- data, it will be used as a
php.ini file
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$random = "some random integer: " . rand(100, 200);
file_put_contents(
    dirname(__FILE__) . '/some-php.ini',
    "foobar={$random}"
);

$ini = new PHPT_Section_INI(dirname(__FILE__) . '/some-php.ini');
$ini->run(new PHPT_SimpleTestCase());

assert('isset($ini->data["foobar"])');
assert('$ini->data["foobar"] == $random');

?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/some-php.ini'); ?>
--EXPECT--
===DONE===

