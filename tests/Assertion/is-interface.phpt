--TEST--
Test_Assertion is the interface that all assertions must implement
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

assert('!interface_exists("Domain51_Test_Assertion")');
require_once 'Domain51/Test/Assertion.php';
assert('interface_exists("Domain51_Test_Assertion")');

?>
===DONE===
--EXPECT--
===DONE===