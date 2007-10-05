--TEST--
True assertion is named assertTrue
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new PHPT_Assert_True(true);
assert('$assertion->getName() == "assertTrue"');

?>
===DONE===
--EXPECT--
===DONE===
