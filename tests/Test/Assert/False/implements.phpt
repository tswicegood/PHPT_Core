--TEST--
Test_Assert_False implements Test_Assertion
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/False.php';
$false = new Test_Assert_False(false);
assert('$false instanceof Test_Assertion');

?>
==DONE==
--EXPECT--
==DONE==