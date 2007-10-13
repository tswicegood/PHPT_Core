--TEST--
If a Case->sections does not contain a TEST section, is() returns false
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$file = new PHPT_Section_File('foobar');
$file->filename = dirname(__FILE__) . '/fake-test-case.phpt';

$sections = new PHPT_SectionList(array($file));

$case = new PHPT_Case($sections, dirname(__FILE__) . '/fake-test-case.phpt');
$validator = new PHPT_Case_Validator_Runnable();
assert('$validator->is($case) == false');

?>
===DONE===
--EXPECT--
===DONE===
