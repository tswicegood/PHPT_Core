--TEST--
If you attempt to set a reporter that does not implement PHPT_Reporter,
PHPT_Controller_CLI will throw an InvalidReporter exception.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-reporter.inc';

$cli = new PHPT_Controller_CLI();
$cli->reporter = new PHPT_SimpleReporter();

class PHPT_SomeReporterWithoutProperInterface { }

try {
    $cli->reporter = new PHPT_SomeReporterWithoutProperInterface();
    trigger_error('exception not caught');
} catch (PHPT_Controller_CLI_InvalidReporter $e) {
    assert('$e->getMessage() == "reporter must implement PHPT_Reporter interface"');
}

?>
===DONE===
--EXPECT--
===DONE===

