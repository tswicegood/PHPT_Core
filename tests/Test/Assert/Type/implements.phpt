--TEST--
Test_Assert_Type implements Test_Assertion
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';
$assert = new Test_Assert_Type(false, 'boolean');
assert('$assert instanceof Test_Assertion');

?>
==DONE==
--EXPECT--
==DONE==