--TEST--
After Domain51_Test_Case::run(), the $output property should contain the results
if the test case.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$random = rand(100, 200);
$case_data = '<?php echo "' . $random . '"; ?>';
$file = new Domain51_Test_Section_File($case_data);
$file->filename = dirname(__FILE__) . '/fake-test-case.php';
$sections = new Domain51_Test_SectionList(array(
    new Domain51_Test_Section_Test('foobar'),
    $file
));

$case = new Domain51_Test_Case($sections);
$case->run();
assert('$case->output == $random');

?>
===DONE===
--EXPECT--
===DONE===