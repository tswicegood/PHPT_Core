--TEST--
When Test_Section_Teardown->run() is called, it returns the source code it was provided
with plus the code it represented appended to the end before the last "?>"
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Section/Teardown.php';

$source = <<<EOC
<?php
// this is a sample file
?>
EOC;

$teardown = new Test_Section_Teardown('// inserted by teardown');
$result = $teardown->run($source);

echo $result;
?>
--EXPECT--
<?php
// this is a sample file
// inserted by teardown
?>