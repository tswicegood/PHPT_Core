--TEST--
Domain51_Test_Assert_NotRegExp implements Domain51_Test_Assertion
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assert/NotRegExp.php';
$reflection = new ReflectionClass('Domain51_Test_Assert_NotRegExp');
assert('$reflection->implementsInterface("Domain51_Test_Assertion")');

?>
===DONE===
--EXPECT--
===DONE===