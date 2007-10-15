--TEST--
On PHPT_Section_Clean::run() completing, the $output property will be set to
the evaluated contents of the clean file that was created
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';

$section = new PHPT_Section_Clean(
    '<?php echo "cl", "e", "a", "n", "e", "d"; ?>'
);

assert('empty($section->output)');
$section->run($case);
assert('$section->output == "cleaned"');

?>
===DONE===
--EXPECT--
===DONE===
