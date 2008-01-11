--TEST--
If the ENV data is evaluatable, it will act as if it is in the
same directory
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$data = "return 'foobar=' . dirname(__FILE__);";
$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';

$env = new PHPT_Section_ENV($data);
$env->run($case);

assert('isset($env->data["foobar"])');

$expected = dirname(__FILE__);
assert('$expected == $env->data["foobar"]');

?>
===DONE===
--EXPECT--
===DONE===

