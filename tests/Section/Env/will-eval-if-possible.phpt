--TEST--
If the provided ENV section can be run through eval() successfully, it will
and those results will be used.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = 'foobar-' . rand(100, 200);
$data = "return 'random={$random}';";

$env = new PHPT_Section_ENV($data);
assert('isset($env->data["random"])');
assert('$env->data["random"] == $random');

?>
===DONE===
--EXPECT--
===DONE===

