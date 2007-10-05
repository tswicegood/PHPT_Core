--TEST--
PHPT_SectionList implements Iterator
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new PHPT_SectionList();
assert('$list instanceof Iterator');

?>
===DONE===
--EXPECT--
===DONE===
