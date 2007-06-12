--TEST--
Will properly run the string passed into it which it assumes is a valid PHP string
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Runner.php';
$one = rand(10, 20);
$two = rand(20, 30);
$str = "<?php echo {$one} * {$two}; ?>";

$runner = new Test_Runner();
ob_start();
$runner->run($str);

$buffer = ob_get_clean();
assert('$buffer == ($one * $two)');
?>
--EXPECT--