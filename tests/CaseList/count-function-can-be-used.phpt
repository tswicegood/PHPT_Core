--TEST--
PHP's internal count() function can be used on the CaseList
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new PHPT_CaseList(array('foobar.php'));
assert('$list->count() == count($list)');

?>
===DONE===
--EXPECT--
===DONE===