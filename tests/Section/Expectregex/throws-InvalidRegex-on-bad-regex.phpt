--TEST--
When the regex pattern provided is invalid, a PHPT_Section_Expectregex_InvalidRegexException
will be thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = 'foobar';

$section = new PHPT_Section_Expectregex('/no ending delimiter');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_Expectregex_InvalidRegexException $e) {
    echo $e->getMessage(), "\n";
}

$section = new PHPT_Section_Expectregex('no beginng delimiter/');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_Expectregex_InvalidRegexException $e) {
    echo $e->getMessage(), "\n";
}

$section = new PHPT_Section_Expectregex('/unknown /Q modifier/');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_Expectregex_InvalidRegexException $e) {
    echo $e->getMessage(), "\n";
}

?>
===DONE===
--EXPECT--
invalid regex in EXPECTREGEX: No ending delimiter '/' found
invalid regex in EXPECTREGEX: Unknown modifier '/'
invalid regex in EXPECTREGEX: Unknown modifier 'Q'
===DONE===