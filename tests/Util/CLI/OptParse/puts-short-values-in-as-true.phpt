--TEST--
Every short value is entered intro Registry->opts as true
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$reg = PHPT_Registry::getInstance();

// sanity check
assert('!isset($reg->opts["r"])');
assert('!isset($reg->opts["q"])');

$args = array('-rq');
$parser = new PHPT_Util_CLI_OptParser();
$parser->parse($args);

assert('$reg->opts["r"] === true');
assert('$reg->opts["q"] === true');

?>
===DONE===
--EXPECT--
===DONE===
