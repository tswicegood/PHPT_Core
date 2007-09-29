--TEST--
NAME in Domain51_Test_Section_Name is used as the key for a given section when it is
the current value
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$env = new Domain51_Test_Section_Env('');
$data = array(
    'foo' => $env,
);

$list = new Domain51_Test_SectionList($data);
assert('$list->key() == "ENV"');

?>
===DONE===
--EXPECT--
===DONE===