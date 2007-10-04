--TEST--
When included, Domain51_Test_Framework registers its static autoload() method with
the SPL autoload stack
--FILE--
<?php

// register a fake autoloader so spl_autoload_functions() has something to return
function FooBarAutoload() { }
spl_autoload_register('FooBarAutoload');

$expected = array('Domain51_Test_Framework', 'autoload');

// sanity check
assert('!in_array($expected, spl_autoload_functions())');

require_once dirname(__FILE__) . '/../../src/Domain51/Test/Framework.php';

assert('in_array($expected, spl_autoload_functions())');

?>
===DONE===
--EXPECT--
===DONE===