--TEST--
When run() is called, the $data that PHPT_Section_File was instantiated with
is executed and the provided $case's output property is set to its result.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();

$code = '<?php echo "Random Int: " . rand(100, 200); ?>';

$file = new PHPT_Section_File($code);
$file->filename = dirname(__FILE__) . '/fake-test-case.php';
$file->run($case);

assert('preg_match("/^Random Int: [12][0-9]{2}/", $case->output)');

?>
===DONE===
--EXPECT--
===DONE===
