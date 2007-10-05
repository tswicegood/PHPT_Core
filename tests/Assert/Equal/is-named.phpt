--TEST--
Equal assertion is named assertEqual
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new PHPT_Assert_Equal(123, 123);
assert('$assertion->getName() == "assertEqual"');

?>
===DONE===
--EXPECT--
===DONE===
