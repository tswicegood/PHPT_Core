--TEST--
If PHPT_Registry->php is set, that is used when a new PHPT_CodeRunner is instantiated
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

// guard assertion
$runner = new PHPT_CodeRunner();
assert('$runner->executable == "php"');

$some_random_php = '/some/random/path/to/php-' . rand(100, 200);
PHPT_Registry::getInstance()->php = $some_random_php;

$runner = new PHPT_CodeRunner();
assert('$runner->executable == "$some_random_php"');

?>
===DONE===
--EXPECT--
===DONE===

