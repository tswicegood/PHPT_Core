--TEST--
If run() encounters a VetoException it will call:

# onCaseStart()
# onCaseFail()
# onCaseEnd()

on the supplied $reporter object, if any.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-reporter.inc';

$test = new PHPT_Section_TEST('simple hello world');
$file = new PHPT_Section_FILE('<?php echo "Hello World!"; ?>');
$expect = new PHPT_Section_EXPECT('Hola World!');
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
--CLEAN--
<?php
@unlink(dirname(__FILE__) . '/fake-test-case.phpt.php');
@unlink(dirname(__FILE__) . '/fake-test-case.phpt.exp');
@unlink(dirname(__FILE__) . '/fake-test-case.phpt.out');
@unlink(dirname(__FILE__) . '/fake-test-case.phpt.diff');
@unlink(dirname(__FILE__) . '/fake-test-case.phpt.log');
?>
--EXPECT--
PHPT_SimpleReporter::onCaseStart was called
PHPT_SimpleReporter::onCaseFail was called
PHPT_SimpleReporter::onCaseEnd was called
===DONE===
