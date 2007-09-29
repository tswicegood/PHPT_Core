--TEST--
Domain51_Test_Section_Env::run() will iterator over all of the supplied Case::$sections
values, and if the value is an instanceof Domain51_Test_Section_EnvModifier, it will
call modifyEnv() and supply it with a copy of itself.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-env-modifier.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$modifier = new Domain51_Test_Section_SimpleEnvModifier();
$modifier->key = "some-key";
$random = rand(100, 200);
$modifier->value = 'some random value: ' . $random;

$case = new Domain51_Test_SimpleTestCase();
$case->sections = new Domain51_Test_SectionList(
    array($modifier)
);

$env = new Domain51_Test_Section_Env('foo=bar');
assert('!isset($env->data[$modifier->key])');
$env->run($case);
assert('isset($env->data[$modifier->key])');
assert('$env->data[$modifier->key] == $modifier->value');

?>
===DONE===
--EXPECT--
===DONE===