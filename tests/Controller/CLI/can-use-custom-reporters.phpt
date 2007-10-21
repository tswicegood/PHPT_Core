--TEST--
If run with --reporter Foobar, PHPT_Reporter_Foobar would be used
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../../_mock-reporter.inc';

$options = array(
    '--reporter',
    'Foobar',
    dirname(__FILE__) . '/../../../tests-supporting/tests',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECT--
PHPT_Reporter_Foobar::onSuiteStart was called
PHPT_Reporter_Foobar::onCaseStart was called
PHPT_Reporter_Foobar::onCasePass was called
PHPT_Reporter_Foobar::onCaseEnd was called
PHPT_Reporter_Foobar::onCaseStart was called
PHPT_Reporter_Foobar::onCasePass was called
PHPT_Reporter_Foobar::onCaseEnd was called
PHPT_Reporter_Foobar::onSuiteEnd was called
===DONE===
