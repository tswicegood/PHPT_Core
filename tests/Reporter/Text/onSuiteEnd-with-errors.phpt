--TEST--
If any onParserError() methods are invoked, output the error and file that caused it
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

function wrappedThrowForStackTrace() {
    throw new Exception('testing for error outputs');
}

$reporter = new PHPT_Reporter_Text();
ob_start();

try {
    wrappedThrowForStackTrace();
} catch (Exception $e) {
    $reporter->onParserError($e);
}
ob_clean();

$reporter->onSuiteEnd(new PHPT_SimpleSuite());

?>
===DONE===
--EXPECTF--


Cases with Errors:
    %sonSuiteEnd-with-errors.phpt - testing for error outputs

Test Cases Run: 1, Passes: 0, Failures: 0, Errors: 1, Skipped: 0
Total Test Time: %d:%d
===DONE===

