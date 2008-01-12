--TEST--
If a dir is specified as part of a long option, allow it
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$opts = array(
    '-f',
    '--foo',
    'bar',
    '--some-path',
    dirname(__FILE__),
);

$parser = new PHPT_Util_CLI_OptParser();
$parser->parse($opts);

$expected = array(
    'f' => true,
    'foo' => 'bar',
    'some-path' => dirname(__FILE__),
);
assert('PHPT_Registry::getInstance()->opts === $expected');

?>
===DONE===
--EXPECT--
===DONE===


