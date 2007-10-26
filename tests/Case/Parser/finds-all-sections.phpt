--TEST--
PHPT_Case_Parser fills the returns PHPT_Case::$sections var with a SectionList that holds
all of the sections in a given file
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$test_file = dirname(__FILE__) . '/simple-test-case.phpt';
copy($test_file . '-', $test_file);
$test_case_file = substr($test_file, 0, -1);

$parser = new PHPT_Case_Parser();
$case = $parser->parse($test_file);

assert('$case->sections instanceof PHPT_SectionList');

assert('$case->sections->current() instanceof PHPT_Section_TEST');
$case->sections->next();
assert('$case->sections->current() instanceof PHPT_Section_FILE');
$case->sections->next();
assert('$case->sections->current() instanceof PHPT_Section_EXPECT');


?>
===DONE===
--CLEAN--
<?php
@unlink(dirname(__FILE__) . '/simple-test-case.php');
@unlink(dirname(__FILE__) . '/simple-test-case.phpt');
?>
--EXPECT--
===DONE===
