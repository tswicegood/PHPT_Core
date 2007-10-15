--TEST--
PHPT_Suite::count() returns based on the number of files it was initialized with
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$data = array('foobar.php');
$list = new PHPT_Suite($data);
assert('$list->count() == 1');

$data = array('foobar.php', 'barfoo.php');
$list = new PHPT_Suite($data);
assert('$list->count() == 2');

?>
===DONE===
--EXPECT--
===DONE===
