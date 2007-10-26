--TEST--
If the data passed in to PHPT_Section_EXPECTREGEX ends in "===DONE===", that will be
stripped from the regex during comparison
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = "foobar" . rand(100, 199);

$data = <<<END
foobar1[0-9]{2}
===DONE===
END;

$section = new PHPT_Section_EXPECTREGEX($data);
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===
