--TEST--
Test_AssertionPack_Basic->assertTrue returns true
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/AssertionPack/Basic.php';
require_once 'Test/Reporter/Null.php';

$assert = new Test_AssertionPack_Basic();
$assert->setReporter(new Test_Reporter_Null());
assert('$assert->assertTrue(true)');
assert('!$assert->assertTrue(false)');

?>
==DONE==
--EXPECT--
==DONE==