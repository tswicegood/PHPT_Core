--TEST--
Test_Util::parse() will return the PHP code when provided a string of PHP with short tags
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Util.php';

$random = rand(10, 20);
$php = "echo 'one line with integer of {$random}';";

$code = Test_Util::parse('<?php' . $php . '?>');
assert('$code == $php');
unset($code);

$code = Test_Util::parse("<?php\n{$php}?>");
assert('$code == $php');
unset($code);

$code = Test_Util::parse("<?php\n{$php}\n?>");
assert('$code == $php');

$code = Test_Util::parse("<?php\n\n{$php}\n\n?>");
assert('$code == $php');

$code = Test_Util::parse("<?php{$php}\n\n?>");
assert('$code == $php');

?>
--EXPECT--