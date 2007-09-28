--TEST--
Domain51_Test_SectionList implements Iterator
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new Domain51_Test_SectionList();
assert('$list instanceof Iterator');

?>
===DONE===
--EXPECT--
===DONE===