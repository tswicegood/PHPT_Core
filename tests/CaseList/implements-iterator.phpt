--TEST--
PHPT_CaseList implements Iterator
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new PHPT_CaseList(array());
assert('$list instanceof Iterator');

?>
===DONE===
--EXPECT--
===DONE===