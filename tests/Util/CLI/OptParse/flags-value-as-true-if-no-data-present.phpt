--TEST--
If just "--foobar" is present with no extra argument, it will be flagged as true
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$reg = PHPT_Registry::getInstance();

// sanity check
assert('!isset($reg->opts["foobar"])');
assert('!isset($reg->opts["barfoo"])');

$parser = new PHPT_Util_CLI_OptParser();
$parser->parse(array(
    '--foobar',
    '--barfoo',
));

$expected = array(
    'foobar' => true,
    'barfoo' => true,
);
assert('$reg->opts == $expected');

?>
===DONE===
--EXPECT--
===DONE===
