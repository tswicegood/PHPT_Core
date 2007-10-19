--TEST--
Every "--foo bar" is put in PHPT_Registry->opts[foo] = bar
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

// sanity check
$reg = PHPT_Registry::getInstance();
assert('!isset($reg->opts["foo"])');
assert('!isset($reg->opts["random"])');

$random = rand(100, 200);
$args = array(
    '--foo',
    'bar',
    '--random',
    $random
);
$parser = new PHPT_Util_CLI_OptParser();
$parser->parse($args);

assert('$reg->opts["foo"] == "bar"');
assert('$reg->opts["random"] == $random');

?>
===DONE===
--EXPECT--
===DONE===