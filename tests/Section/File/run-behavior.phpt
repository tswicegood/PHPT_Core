--TEST--
When run() is called, the $data that PHPT_Section_FILE was instantiated with
is executed and the provided $case's output property is set to its result.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.phpt';

$code = '<?php echo "Random Int: " . rand(100, 200); ?>';

$file = new PHPT_Section_FILE($code);
$file->filename = dirname(__FILE__) . '/fake-test-case.php';
$file->run($case);

assert('preg_match("/^Random Int: [12][0-9]{2}/", $case->output)');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/fake-test-case.php'); ?>
--EXPECT--
===DONE===
