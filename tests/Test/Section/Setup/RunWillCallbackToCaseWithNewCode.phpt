--TEST--
When Test_Section_Setup->run() is called, it returns the source code it was provided
with plus the code it contains
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Section/Setup.php';

$source = <<<EOC
<?php
// this is a sample file
?>
EOC;

$setup = new Test_Section_Setup('// inserted by setup');
$result = $setup->run($source);

echo $result;
?>
--EXPECT--
<?php
// inserted by setup
// this is a sample file
?>