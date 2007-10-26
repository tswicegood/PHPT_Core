--TEST--
PHPT_Section_ENV::run() will iterator over all of the supplied Case::$sections
values, and if the value is an instanceof PHPT_Section_ENVModifier, it will
call modifyEnv() and supply it with a copy of itself.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-env-modifier.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$modifier = new PHPT_Section_SimpleEnvModifier();
$modifier->key = "some-key";
$random = rand(100, 200);
$modifier->value = 'some random value: ' . $random;

$case = new PHPT_SimpleTestCase();
$case->sections = new PHPT_SectionList(
    array($modifier)
);

$env = new PHPT_Section_ENV('foo=bar');
assert('!isset($env->data[$modifier->key])');
$env->run($case);
assert('isset($env->data[$modifier->key])');
assert('$env->data[$modifier->key] == $modifier->value');

?>
===DONE===
--EXPECT--
===DONE===
