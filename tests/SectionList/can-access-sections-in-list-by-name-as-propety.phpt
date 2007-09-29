--TEST--
A property can be accessed directly as a property using its key
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$env = new Domain51_Test_Section_Env('');
$list = new Domain51_Test_SectionList(array($env));

assert('$list->ENV == $env');

?>
===DONE===
--EXPECT--
===DONE===