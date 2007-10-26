--TEST--
If run() encounters a VetoException it will call:

# onCaseStart()
# onCaseSkip()
# onCaseEnd()

on the supplied $reporter object, if any.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-reporter.inc';

$test = new PHPT_Section_TEST('simple hello world');
$file = new PHPT_Section_FILE('<?php echo "Hello World!"; ?>');
$expect = new PHPT_Section_EXPECT('Hello World!');
$skip = new PHPT_Section_SKIPIF('skip - always skip');
$list = new PHPT_SectionList(array(
    $test,
    $file,
    $expect,
    $skip,
));

$case = new PHPT_Case($list, dirname(__FILE__) . '/fake-test-case.phpt');
$reporter = new PHPT_SimpleReporter();
$case->run($reporter);


?>
===DONE===
--EXPECT--
PHPT_SimpleReporter::onCaseStart was called
PHPT_SimpleReporter::onCaseSkip was called
PHPT_SimpleReporter::onCaseEnd was called
===DONE===
