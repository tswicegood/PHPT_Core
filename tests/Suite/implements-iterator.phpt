--TEST--
PHPT_Suite implements Iterator
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new PHPT_Suite(array());
assert('$list instanceof Iterator');

?>
===DONE===
--EXPECT--
===DONE===
