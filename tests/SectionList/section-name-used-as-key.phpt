--TEST--
NAME in PHPT_Section_Name is used as the key for a given section when it is
the current value
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$env = new PHPT_Section_ENV('');
$data = array(
    'foo' => $env,
);

$list = new PHPT_SectionList($data);
assert('$list->key() == "ENV"');

?>
===DONE===
--EXPECT--
===DONE===
