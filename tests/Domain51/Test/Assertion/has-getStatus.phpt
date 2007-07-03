--TEST--
Domain51_Test_Assertion requires a getStatus() method
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assertion.php';
$reflection = new ReflectionClass('Domain51_Test_Assertion');
assert('$reflection->hasMethod("getStatus")');

?>
===DONE===
--EXPECT--
===DONE===