--TEST--
When Section_Expectregex fails, it should write a .exp file with the expected outcome.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$basename = 'simple-fake-case' . rand(100, 200);
$filename = dirname(__FILE__) . "/{$basename}.php";
$exp_filename = dirname(__FILE__) . "/{$basename}.exp";

// clean up in case its left over
@unlink($exp_filename);

$case = new Domain51_Test_SimpleTestCase();
$case->filename = $filename;
$case->output = 'bar';

$expect_data = '/^foo$/';
$expect = new Domain51_Test_Section_Expectregex($expect_data);
try {
    $expect->run($case);
} catch (Domain51_Test_Section_Expectregex_UnexpectedOutputException $e) {
    assert('file_exists($exp_filename)');
    assert('trim(file_get_contents($exp_filename)) == $expect_data');
}

?>
===DONE===
--CLEAN--
<?php

$dir = dirname(__FILE__);
$files = scandir($dir);
foreach ($files as $file) {
    if (preg_match('/^simple-fake-case.*/', $file)) {
        unlink($dir . '/' . $file);
    }
}
?>
--EXPECT--
===DONE===