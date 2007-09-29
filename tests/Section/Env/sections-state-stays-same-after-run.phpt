--TEST--
The state of the sections object doesn't change after run() is called
--FILE--
<?php


require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';
require_once dirname(__FILE__) . '/_simple-env-modifier.inc';

$case = new Domain51_Test_SimpleTestCase();
$sectionList = new Domain51_Test_SectionList(array(
    'ENV' => new Domain51_Test_Section_Env(''),
    'INI' => new Domain51_Test_Section_Ini(''),
    'fake' => new Domain51_Test_Section_SimpleEnvModifier(''),
));

$before_run = array();
foreach ($sectionList as $value) {
    $before_run[] = $value;
}

$case->sections = $sectionList;

$env = new Domain51_Test_Section_Env('');
$env->run($case);

$after_run = array();
foreach ($sectionList as $value) {
    $after_run[] = $value;
}

assert('$before_run == $after_run');

?>
===DONE===
--EXPECT--
===DONE===