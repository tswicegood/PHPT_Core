--TEST--
Domain51_Test_Framework's autoload() method will automatically load other
classes within the framework.
--FILE--
<?php

assert('class_exists("Domain51_Test_SectionList") == false');
require_once dirname(__FILE__) . '/../../src/Domain51/Test/Framework.php';
assert('class_exists("Domain51_Test_SectionList") == true');

?>
===DONE===
--EXPECT--
===DONE===