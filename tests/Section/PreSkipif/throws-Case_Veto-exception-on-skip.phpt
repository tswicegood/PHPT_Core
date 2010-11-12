--TEST--
If the first four characters in the returned value of $data is equal to
"skip", then a PHPT_Case_VetoException will be thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$section = new PHPT_Section_PRESKIPIF('skip');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_VetoException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===
