--TEST--
If the provided $code has an error, an exception is thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$php = 'return foo\'bar';
$code = new PHPT_Util_Code($php);

try {
    $code->evaluate();
    trigger_error('exception not caught');
} catch (PHPT_Util_Code_InvalidSyntaxException $e) {
    assert('$e->getMessage() == $php');
}

?>
===DONE===
--EXPECT--
===DONE===

