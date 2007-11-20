--TEST--
Walk through the full use-case
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Text();
$suite = new PHPT_SimpleSuite();

$reporter->onSuiteStart($suite);

for ($i2 = 0; $i2 < 8; $i2++) {
    $case = new PHPT_SimpleTestCase();
    $reporter->onCaseStart($case);
    $reporter->onCasePass($case);
    $reporter->onCaseEnd($case);
}

$case = new PHPT_SimpleTestCase();
$case->filename = '/path/to/foobar.phpt';
$failure = new PHPT_SimpleFailureException('test failure message');

$reporter->onCaseStart($case);
$reporter->onCaseFail($case, $failure);
$reporter->onCaseEnd($case);

$case = new PHPT_SimpleTestCase();
$case->filename = '/path/to/barfoo.phpt';

$veto = new PHPT_Case_VetoException('simple skip message');
$reporter->onCaseStart($case);
$reporter->onCaseSkip($case, $veto);
$reporter->onCaseEnd($case);

for ($i = 0; $i < 90; $i++) {
    $case = new PHPT_SimpleTestCase();
    $reporter->onCaseStart($case);
    $reporter->onCasePass($case);
    $reporter->onCaseEnd($case);
}

$reporter->onSuiteEnd($suite);

?>
===DONE===
--EXPECTF--
PHPT Test Runner v%f%s

........FS......................................................................
....................

Skipped Cases:
    /path/to/barfoo.phpt - simple skip message

Failed Cases:
    /path/to/foobar.phpt - test failure message
        001- one
        001+ two

Test Cases Run: 100, Passes: 98, Failures: 1, Skipped: 1
===DONE===
