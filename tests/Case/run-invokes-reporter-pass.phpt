--TEST--
If run() is supplied with an object that implements PHPT_Reporter, it will
call its onCaseStart(), onCasePass(), and onCaseEnd() methods
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-reporter.inc';

$test = new PHPT_Section_Test('simple hello world');
$file = new PHPT_Section_File('<?php echo "Hello World!"; ?>');
$expect = new PHPT_Section_Expect('Hello World!');
$list = new PHPT_SectionList(array(
    $test,
    $file,
    $expect,
));

$case = new PHPT_Case($list, dirname(__FILE__) . '/fake-test-case.phpt');
$reporter = new PHPT_SimpleReporter();
$case->run($reporter);

?>
===DONE===
--EXPECT--
PHPT_SimpleReporter::onCaseStart was called
PHPT_SimpleReporter::onCasePass was called
PHPT_SimpleReporter::onCaseEnd was called
===DONE===
