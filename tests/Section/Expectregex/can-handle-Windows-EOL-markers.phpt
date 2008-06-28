--TEST--
PHPT_Section_EXPECTREGEX can handle regular expressions that have Windows
EOL markers on them.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = 'foobar' . rand(100, 200);

$data = "/.*foobar[12][0-9]{2}.*/\r\n===DONE===";
$section = new PHPT_Section_EXPECTREGEX($data);
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_FailureException $e) {

}

$case->output = 'foobar' . rand(100, 200) . "\r\n===DONE===";
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===

