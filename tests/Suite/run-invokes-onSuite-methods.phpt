--TEST--
When run is invoked, it calls the various onSuite* methods of the reporter it was given
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-reporter.inc';

$reporter = new PHPT_SimpleReporter();
$files = array(
    dirname(__FILE__) . '/../../tests-supporting/tests/addition.phpt',
);
$suite = new PHPT_Suite($files);
$suite->run($reporter);

?>
===DONE===
--EXPECT--
PHPT_SimpleReporter::onSuiteStart was called
PHPT_SimpleReporter::onCaseStart was called
PHPT_SimpleReporter::onCasePass was called
PHPT_SimpleReporter::onCaseEnd was called
PHPT_SimpleReporter::onSuiteEnd was called
===DONE===
