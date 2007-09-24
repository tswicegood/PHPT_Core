--TEST--
The value of $data is trimmed prior to being returned by __toString()
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$cookie_data = "  trims two spaces off start and one tab off end\t";
$cookie = new Domain51_Test_Section_Cookie($cookie_data);
assert('(string)$cookie == "trims two spaces off start and one tab off end"');

?>
===DONE===
--EXPECT--
===DONE===