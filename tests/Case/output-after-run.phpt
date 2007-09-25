--TEST--
After Domain51_Test_Case::run(), the $output property should contain the results
if the test case.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$random = rand(100, 200);
$case_data = '<?php echo "' . $random . '"; ?>';
$case = new Domain51_Test_Case('', 'foobar.php', $case_data, '');
$case->run();
assert('$case->output == $random');

?>
===DONE===
--EXPECT--
===DONE===