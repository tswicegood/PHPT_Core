--TEST--
When the path is relative (i.e., doesn't start with PATH_SEPARATOR) it is still able to find tests
--SKIPIF--
<?php
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
    // TODO Fix this test under Windows
    echo 'skip - not working under Windows for some weird reason';
}
?>
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
--EXPECTF--
PHPT Test Runner v@@VERSION@@

..

Test Cases Run: 2, Passes: 2, Failures: 0, Errors: 0, Skipped: 0
Total Test Time: %d:%d
PHPT Test Runner v@@VERSION@@

..

Test Cases Run: 2, Passes: 2, Failures: 0, Errors: 0, Skipped: 0
Total Test Time: %d:%d
===DONE===
