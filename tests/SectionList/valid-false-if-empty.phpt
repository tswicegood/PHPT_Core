--TEST--
If SectionList is instantiated with an empty array, valid() will be false
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new PHPT_SectionList(array());
assert('$list->valid() == false');

?>
===DONE===
--EXPECT--
===DONE===
