--TEST--
PHPT_Assert_RegExp verifies that the pattern PCRE pattern matches the value that is passed
in.  getStatus() returns true if the assertion is valid, while getMessage() returns an appropriate
message.
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$valid = new PHPT_Assert_RegExp('/\d/', 'ABCabc123');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid = new PHPT_Assert_RegExp('/\d/', 'ABCabc');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";
?>
===DONE===
--EXPECT--
pattern ['/\d/'] is contained in value ['ABCabc123']
pattern ['/\d/'] is not contained in value ['ABCabc']
===DONE===
