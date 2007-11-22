--TEST--
If any onCaseSkip() methods are invoked, output the name of the files skipped
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = '/path/to/foobar.phpt';
$veto = new PHPT_Case_VetoException('for testing purposes');

$reporter = new PHPT_Reporter_Text();
ob_start();
$reporter->onCaseSkip($case, $veto);
ob_clean();

$reporter->onSuiteEnd(new PHPT_SimpleSuite());

?>
===DONE===
--EXPECTF--


Skipped Cases:
    /path/to/foobar.phpt - for testing purposes

Test Cases Run: 1, Passes: 0, Failures: 0, Skipped: 1
Total Test Time: %d:%d
===DONE===
