--TEST--
PHPT_Framework has a "VERSION" constant that is set to @@VERSION@@
Note: the VERSION token (surrounded in two @ signs) is replaced with the proper
version when the system is built by phing
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$framework = new ReflectionClass('PHPT_Framework');
assert('$framework->hasConstant("VERSION")');
assert('PHPT_Framework::VERSION == "@@VERSION@@"');

?>
===DONE===
--EXPECT--
===DONE===

