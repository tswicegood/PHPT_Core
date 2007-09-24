--TEST--
If you cast Domain51_Test_Section_Cookie to a string, it will output the
value it was instantiated with.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$cookie_data = "Hello World\n"
               . "Random #: " . rand(100, 200);
$cookie = new Domain51_Test_Section_Cookie($cookie_data);
assert('(string)$cookie == $cookie_data');

?>
===DONE===
--EXPECT--
===DONE===