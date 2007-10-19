--TEST--
If "q" is used, it works like "--quiet"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../../_mock-reporter.inc';

$options = array(
    '--reporter',
    'Foobar',
    '-q',
    dirname(__FILE__) . '/../../../tests-supporting/tests',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--EXPECT--
PHPT_Reporter_FoobarQuiet::onSuiteStart was called
PHPT_Reporter_FoobarQuiet::onCaseStart was called
PHPT_Reporter_FoobarQuiet::onCasePass was called
PHPT_Reporter_FoobarQuiet::onCaseEnd was called
PHPT_Reporter_FoobarQuiet::onCaseStart was called
PHPT_Reporter_FoobarQuiet::onCasePass was called
PHPT_Reporter_FoobarQuiet::onCaseEnd was called
PHPT_Reporter_FoobarQuiet::onSuiteEnd was called
===DONE===