--TEST--
When the path is relative (i.e., doesn't start with PATH_SEPARATOR) it is still able to find tests
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

chdir(dirname(__FILE__) . '/../../../tests-supporting');

$controller = new PHPT_Controller_CLI();
$controller->run(array(
    './tests',
));

$controller->run(array(
    'tests',
));

?>
===DONE===
--EXPECT--
PHPT Test Runner v0.1

..

Test Cases Run: 2, Passes: 2, Failures: 0, Skipped: 0
PHPT Test Runner v0.1

..

Test Cases Run: 2, Passes: 2, Failures: 0, Skipped: 0
===DONE===