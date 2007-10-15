--TEST--
The Expectf section works when there are regex special characters present
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = "/path/to/foobar-" . rand(1, 9);

$section = new PHPT_Section_Expectf('/path/to/foobar-%d');
$section->run($case);

$case = new PHPT_SimpleTestCase();
$case->output = 'Contains question mark ?, dollar sign $, pipe |, carrot ^, [brackets], equal =, <less and greater than>, {curly braces}';

$section = new PHPT_Section_Expectf('Contains %s ?, %s $, %s |, %s ^, [%s], %s =, <%s>, {%s}');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===
