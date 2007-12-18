--TEST--
If the provided $code has a syntax error, isValid() will return false
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$php = 'ret\'un false;';
$code = new PHPT_Util_Code($php);
assert('$code->isValid() === false');

$php = 'return false;';
$code = new PHPT_Util_Code($php);
assert('$code->isValid() === true');

?>
===DONE===
--EXPECT--
===DONE===

