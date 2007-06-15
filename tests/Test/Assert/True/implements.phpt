--TEST--
Test_Assert_True implements Test_Assertion
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/True.php';
$true = new Test_Assert_True(true);
assert('$true instanceof Test_Assertion');

?>
==DONE==
--EXPECT--
==DONE==