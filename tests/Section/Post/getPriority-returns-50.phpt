--TEST--
PHPT_Section_POST::getPriority() returns 50
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$post = new PHPT_Section_POST('');
assert('$post->getPriority() === 50');

?>
===DONE===
--EXPECT--
===DONE===