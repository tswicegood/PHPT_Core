--TEST--
Passes the provided $reporter to the parser to handle invalid tests
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
require_once dirname(__FIlE__) . '/../_simple-reporter.inc';

$reporter = new PHPT_SimpleReporter();

$invalid_test_file = dirname(__FILE__) . '/../../tests-supporting/tests-invalid/01-invalid.phpt';
$suite = new PHPT_Suite(array(
    $invalid_test_file,
));
$suite->run($reporter);

?>
===DONE===
--EXPECT--
PHPT_SimpleReporter::onSuiteStart was called
PHPT_SimpleReporter::onParserError was called
PHPT_SimpleReporter::onSuiteEnd was called
===DONE===

