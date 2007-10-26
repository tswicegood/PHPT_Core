--TEST--
Throws an exception if no "hex" characters are found within the string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = 'zyx';
$case->filename = dirname(__FILE__) . '/foobar.phpt';

$expect = new PHPT_Section_EXPECTF('%x');
try {
    $expect->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_EXPECTF_UnexpectedOutputException $e) {
    
}

?>
===DONE===
--CLEAN--
<?php
$path = dirname(__FILE__);
include "{$path}/../_clean.inc";
?>
--EXPECT--
===DONE===
