--TEST--
If a provided options is a valid file, skip it
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$opts = array(
    '-f',
    '--foo',
    'bar',
    dirname(__FILE__) . '/../../../../tests-supporting/tests/hello-world.phpt',
);

$parser = new PHPT_Util_CLI_OptParser();
$parser->parse($opts);
$expected = array(
    'f' => true,
    'foo' => 'bar',
);

assert('PHPT_Registry::getInstance()->opts == $expected');

?>
===DONE===
--EXPECT--
===DONE===

