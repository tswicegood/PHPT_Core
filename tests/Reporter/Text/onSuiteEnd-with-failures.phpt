--TEST--
Outputs information about failures if onCaseFail() was called
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = '/path/to/foobar.phpt';

$failure = new PHPT_SimpleFailureException('test failure message');

$reporter = new PHPT_Reporter_Text();
ob_start();
$reporter->onCaseFail($case, $failure);
ob_clean();

$case = new PHPT_SimpleTestCase();
$case->filename = '/path/to/barfoo.phpt';
$failure = new PHPT_SimpleFailureException('second failure message');

ob_start();
$reporter->onCaseFail($case, $failure);
ob_clean();

$reporter->onSuiteEnd(new PHPT_SimpleSuite());

?>
===DONE===
--EXPECTF--


Failed Cases:
    /path/to/foobar.phpt - test failure message
        001- one
        001+ two

    /path/to/barfoo.phpt - second failure message
        001- one
        001+ two

Test Cases Run: 2, Passes: 0, Failures: 2, Errors: 0, Skipped: 0
Total Test Time: %d:%d
===DONE===
