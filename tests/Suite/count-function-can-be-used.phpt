--TEST--
PHP's internal count() function can be used on the Suite
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new PHPT_Suite(array('foobar.php'));
assert('$list->count() == count($list)');

?>
===DONE===
--EXPECT--
===DONE===
