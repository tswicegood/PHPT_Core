--TEST--
On PHPT_Section_FILE::run(), it will call any other sections the provide Case that
implement the Section_FILEModifier interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';
require_once dirname(__FILE__) . '/_simple-file-modifier.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';
$case->sections = new PHPT_SectionList(array(
    new PHPT_SimpleFileModifier(),
));

$section = new PHPT_Section_FILE('hello');
$section->run($case);

?>
===DONE===
--EXPECT--
PHPT_SimpleFileModifier::modifyFile was called
===DONE===
