--TEST--
Is instantiated with a name, and an array of the various pieces of the test case
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Case.php';
require_once 'Test/Section/Setup.php';
require_once 'Test/Section/Teardown.php';

$test = array(
    'setup' => new Test_Section_Setup('<?php echo "setup\n"; ?>'),
    'teardown' => new Test_Section_Teardown('<?php echo "teardown\n"; ?>'),
);
$case = new Test_Case('sometest', '<?php echo "test\n"; ?>', $test);
$case->run();

echo 'complete';
?>
--EXPECT--
setup
test
teardown
complete