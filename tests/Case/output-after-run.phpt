--TEST--
After PHPT_Case::run(), the $output property should contain the results
if the test case.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$random = rand(100, 200);
$case_data = '<?php echo "' . $random . '"; ?>';
$file = new PHPT_Section_FILE($case_data);
$file->filename = dirname(__FILE__) . '/fake-test-case.php';
$sections = new PHPT_SectionList(array(
    new PHPT_Section_TEST('foobar'),
    $file
));

$case = new PHPT_Case($sections, dirname(__FILE__) . '/fake-test-case.phpt');
$case->run(new PHPT_Reporter_Null());
assert('$case->output == $random');

?>
===DONE===
--EXPECT--
===DONE===
