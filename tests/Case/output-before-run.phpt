--TEST--
Domain51_Test_Case::$output is null at instantiation
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$case = new Domain51_Test_Case(new Domain51_Test_SectionList());
assert('is_null($case->output)');

?>
===DONE===
--EXPECT--
===DONE===