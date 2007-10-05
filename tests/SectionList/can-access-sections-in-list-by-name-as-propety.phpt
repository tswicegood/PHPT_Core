--TEST--
A property can be accessed directly as a property using its key
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$env = new PHPT_Section_Env('');
$list = new PHPT_SectionList(array($env));

assert('$list->ENV == $env');

?>
===DONE===
--EXPECT--
===DONE===
