--TEST--
PHPT_Suite implements Countable
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
$list = new PHPT_Suite(array());
assert('$list instanceof Countable');

?>
===DONE===
--EXPECT--
===DONE===
