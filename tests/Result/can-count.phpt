--TEST--
PHPT_Result can count the results it has
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$result = new PHPT_Result($array);
assert('$result->count() == 2');

?>
===DONE===
--EXPECT--
===DONE===
