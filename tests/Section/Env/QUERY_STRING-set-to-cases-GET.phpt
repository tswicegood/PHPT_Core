--TEST--
If the provide Case has a GET section, the QUERY_STRING value in Section_Env
will be modified to match the GET section's trimmed value.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$random = rand(100, 200);
$case->sections['GET'] = $random;

$env = new Domain51_Test_Section_Env('foo=bar');
assert('$env->data["QUERY_STRING"] == ""');
$env->run($case);
assert('$env->data["QUERY_STRING"] == $random');

$case->sections['GET'] = 'has trailing whitespace removed ';
$env->run($case);
assert('$env->data["QUERY_STRING"] == "has trailing whitespace removed"');

?>
===DONE===
--EXPECT--
===DONE===