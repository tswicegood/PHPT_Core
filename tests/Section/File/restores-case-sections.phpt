--TEST--
After PHPT_Section_FILE::run(), the sections property of the provide $case object
is restored to its unfiltered state
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';
require_once dirname(__FILE__) . '/_simple-file-modifier.inc';

$case = new PHPT_SimpleTestCase();
$case->sections = new PHPT_SectionList(array(
    new PHPT_Section_ARGS('foo=bar'),
));

$section = new PHPT_Section_FILE('hello world');
$section->run($case);

assert('$case->sections->valid()');

?>
===DONE===
--EXPECT--
===DONE===
