--TEST--
Is instantiated with a name, and an array of the various pieces of the test case
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Case.php';

$test = array(
    'setup' => '<?php echo "setup\n"; ?>',
    'file'  => '<?php echo "test\n"; ?>',
    'teardown' => '<?php echo "teardown\n"; ?>',
);
$case = new Test_Case('sometest', $test);
$case->run();

?>
--EXPECT--
setup
test
teardown