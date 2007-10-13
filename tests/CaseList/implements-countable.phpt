--TEST--
PHPT_CaseList implements Countable
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
$list = new PHPT_CaseList(array());
assert('$list instanceof Countable');

?>
===DONE===
--EXPECT--
===DONE===