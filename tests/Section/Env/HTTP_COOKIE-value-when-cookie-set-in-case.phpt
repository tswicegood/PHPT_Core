--TEST--
If the provided Case has a COOKIE section, its trimmed value will be used in the
Section_Env object's HTTP_COOKIE value.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$random = rand(100, 200);
$case->sections['COOKIE'] = $random;

$env = new Domain51_Test_Section_Env('foo=bar');
assert('$env->data["HTTP_COOKIE"] == ""');
$env->run($case);
assert('$env->data["HTTP_COOKIE"] == $random');

$case->sections['COOKIE'] = 'has trailing whitespace removed ';
$env->run($case);
assert('$env->data["HTTP_COOKIE"] == "has trailing whitespace removed"');

?>
===DONE===
--EXPECT--
===DONE===