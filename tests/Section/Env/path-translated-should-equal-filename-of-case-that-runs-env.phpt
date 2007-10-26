--TEST--
When PHPT_Section_ENV::run() is called, the data['PATH_TRANSLATED']
value should always equal the provided Case's filename property.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$filename = 'some-random-file-' . rand(100, 200);
$case->filename = $filename;
$env = new PHPT_Section_ENV('foo=bar');

assert('$env->data["PATH_TRANSLATED"] == ""');
$env->run($case);
assert('$env->data["PATH_TRANSLATED"] == $filename');

?>
===DONE===
--EXPECT--
===DONE===
