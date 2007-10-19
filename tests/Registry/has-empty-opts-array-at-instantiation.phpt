--TEST--
PHPT_Registry->opts is an empty array after instantation
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reg = new PHPT_Registry();
assert('is_array($reg->opts)');

?>
===DONE===
--EXPECT--
===DONE===