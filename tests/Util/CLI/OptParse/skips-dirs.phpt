--TEST--
If a provided options is a valid dir, skip it
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$opts = array(
    '-f',
    '--foo',
    'bar',
    dirname(__FILE__) . '/../../../../tests-supporting/tests',
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


