--TEST--
When included, PHPT_Framework registers its static autoload() method with
the SPL autoload stack
--FILE--
<?php

// register a fake autoloader so spl_autoload_functions() has something to return
function FooBarAutoload() { }
spl_autoload_register('FooBarAutoload');

$expected = array('PHPT_Framework', 'autoload');

// sanity check
assert('!in_array($expected, spl_autoload_functions())');

require_once dirname(__FILE__) . '/../../src/PHPT/Framework.php';

assert('in_array($expected, spl_autoload_functions())');

?>
===DONE===
--EXPECT--
===DONE===
