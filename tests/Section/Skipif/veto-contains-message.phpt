--TEST--
The VetoException thrown by SKIPIF contains the message (if any)
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$message = 'random integer in message: ' . rand(1000, 2000);
$section = new PHPT_Section_SKIPIF('skip - ' . $message);
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_VetoException $e) {
    assert('$e->getMessage() == $message');
}

?>
===DONE===
--EXPECT--
===DONE===

