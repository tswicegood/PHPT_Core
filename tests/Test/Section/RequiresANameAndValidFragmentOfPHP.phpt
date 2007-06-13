--TEST--
Test_Section objects require a valid name and fragment of PHP
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE


require_once dirname(__FILE__) . '/_bootstrap.php';

$random = rand(10, 20);
$name = 'name_' . rand(10, 20);
$php_fragment = 'echo "Hello World, my number is ' . $random . '";';
$php = "<?php {$php_fragment} ?>";
$section = new TestableSection($name, $php);

assert('$section->name == $name');
assert('$section->php == $php');
assert('$section->php_fragment == $php_fragment');
echo 'complete';
?>
--EXPECT--
complete