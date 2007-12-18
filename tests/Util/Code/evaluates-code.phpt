--TEST--
evaluate() returns the result of the provided code
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = rand(1000, 2000);
$code = "return {$random};";

$util = new PHPT_Util_Code($code);

assert('$util->evaluate() == $random');
assert('$util->evaluate() == eval($code)');

?>
===DONE===
--EXPECT--
===DONE===

