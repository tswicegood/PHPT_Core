--TEST--
When Domain51_Test_Section_Env::run() is called, the data['PATH_TRANSLATED']
value should always equal the provided Case's filename property.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$filename = 'some-random-file-' . rand(100, 200);
$case->filename = $filename;
$env = new Domain51_Test_Section_Env('foo=bar');

assert('$env->data["PATH_TRANSLATED"] == ""');
$env->run($case);
assert('$env->data["PATH_TRANSLATED"] == $filename');

?>
===DONE===
--EXPECT--
===DONE===