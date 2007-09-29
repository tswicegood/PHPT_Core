--TEST--
If a SectionList contains a section of $name, has($name) will return true
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new Domain51_Test_SectionList(array(
    new Domain51_Test_Section_Env(''),
));

assert('$list->has("ENV") == true');
assert('$list->has("INI") == false');

?>
===DONE===
--EXPECT--
===DONE===