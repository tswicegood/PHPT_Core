--TEST--
All right-side whitespace of a section is trimmed while the left is left alone
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$test_file = dirname(__FILE__) . '/simple-test-case-with-whitespace.phpt';
copy($test_file . '-', $test_file);
$test_case_file = substr($test_file, 0, -1);

$parser = new PHPT_Case_Parser();
$case = $parser->parse($test_file);

echo $case->name, "\n";

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/simple-test-case-with-whitespace.phpt'); ?>
--EXPECT--

The lines after this are trimmed, but nothing within the line itself
gets trimmed nor the whitespace preceeding it.
  These spaces are still here, but not the four below
===DONE===