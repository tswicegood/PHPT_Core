--TEST--
is() returns the result of the Validator object that it is used with
--ARGS--
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-validator.inc';

$case = new PHPT_Case(new PHPT_SectionList(), dirname(__FILE__) . '/fake-test-case.phpt');

$validator = new FooBarValidator();
assert('$case->is($validator) == true');

$validator->return = false;
assert('$case->is($validator) == false');

?>
===DONE===
--EXPECT--
===DONE===
