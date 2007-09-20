--TEST--
Domain51_Test_Result::count() can be filtered with by status when
a string is provided
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';
$result = new Domain51_Test_Result($array);
assert('$result->count() == 2');
assert('$result->count("pass") == 1');
assert('$result->count("fail") == 1');

?>
===DONE===
--EXPECT--
===DONE===