--TEST--
If a SectionList contains a section of $name, has($name) will return true
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new PHPT_SectionList(array(
    new PHPT_Section_ENV(''),
));

assert('$list->has("ENV") == true');
assert('$list->has("INI") == false');

?>
===DONE===
--EXPECT--
===DONE===
