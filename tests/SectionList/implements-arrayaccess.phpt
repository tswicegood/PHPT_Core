--TEST--
Domain51_Test_SectionList implements ArrayAccess
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new Domain51_Test_SectionList();
assert('$list instanceof ArrayAccess');

?>
===DONE===
--EXPECT--
===DONE===