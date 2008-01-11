--TEST--
If the provided ENV section can be run through eval() successfully, it will
and those results will be used.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$random = 'foobar-' . rand(100, 200);
$data = "return 'random={$random}';";

$env = new PHPT_Section_ENV($data);
$env->run(new PHPT_SimpleTestCase());

assert('isset($env->data["random"])');
assert('$env->data["random"] == $random');

?>
===DONE===
--EXPECT--
===DONE===

