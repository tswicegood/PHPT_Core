--TEST--
Can handle ["E notation"][1] style floats.

Note: this is kind of a cheap match as the digits after the E are enough for a match to
be triggered.

[1]: http://en.wikipedia.org/wiki/Scientific_notation#E_notation
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case_positive = new Domain51_Test_SimpleTestCase();
$case_positive->output = 'E+23';

$case_negative = new Domain51_Test_SimpleTestCase();
$case_negative->output = '0E-23';

$case_short = new Domain51_Test_SimpleTestCase();
$case_short->output = '0E23';

// sanity check
assert('$case_positive->output == (float)$case_positive->output');
assert('$case_negative->output == (float)$case_negative->output');
assert('$case_short->output == (float)$case_short->output');

$section = new Domain51_Test_Section_Expectf('%f');
$section->run($case_positive);
$section->run($case_negative);
$section->run($case_short);


?>
===DONE===
--EXPECT--
===DONE===