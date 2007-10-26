--TEST--
The state of the sections object doesn't change after run() is called
--FILE--
<?php


require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';
require_once dirname(__FILE__) . '/_simple-env-modifier.inc';

$case = new PHPT_SimpleTestCase();
$sectionList = new PHPT_SectionList(array(
    'ENV' => new PHPT_Section_ENV(''),
    'INI' => new PHPT_Section_INI(''),
    'fake' => new PHPT_Section_SimpleEnvModifier(''),
));

$before_run = array();
foreach ($sectionList as $value) {
    $before_run[] = $value;
}

$case->sections = $sectionList;

$env = new PHPT_Section_ENV('');
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
