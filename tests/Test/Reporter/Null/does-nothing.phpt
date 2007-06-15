--TEST--
Test_Reporter_Null does nothing but satisfy type casting dependencies.  This is generally
only useful filling the role of a Mock object.
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Reporter/Null.php';
require_once 'Test/Assert/True.php';
$reporter = new Test_Reporter_Null();
assert('$reporter instanceof Test_Reporter');

$assert = new Test_Assert_True(true);
$reporter->onSuccess($assert);
unset($assert);

$assert = new Test_Assert_True(false);
$reporter->onFailure($assert);

?>
==DONE==
--EXPECT--
==DONE==