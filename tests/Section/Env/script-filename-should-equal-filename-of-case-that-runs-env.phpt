--TEST--
When PHPT_Section_Env::run() is called, the data['SCRIPT_FILENAME']
value should always equal the provided Case's filename property.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$filename = 'some-random-file-' . rand(100, 200);
$case->filename = $filename;
$env = new PHPT_Section_Env('foo=bar');

assert('$env->data["SCRIPT_FILENAME"] == ""');
$env->run($case);
assert('$env->data["SCRIPT_FILENAME"] == $filename');

?>
===DONE===
--EXPECT--
===DONE===
