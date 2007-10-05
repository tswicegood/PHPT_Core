--TEST--
PHPT_Framework's autoload() method will automatically load other
classes within the framework.
--FILE--
<?php

assert('class_exists("PHPT_SectionList") == false');
require_once dirname(__FILE__) . '/../../src/PHPT/Framework.php';
assert('class_exists("PHPT_SectionList") == true');

?>
===DONE===
--EXPECT--
===DONE===
