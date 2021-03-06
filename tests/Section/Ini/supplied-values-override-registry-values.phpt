--TEST--
If a Registry value is present, the data provided at the instantation
is given preference
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

PHPT_Registry::getInstance()->opts = array(
    'ini' => 'foo=bar',
);

$ini = new PHPT_Section_INI('foo=foo');
$ini->run(new PHPT_SimpleTestCase());

assert('preg_match("/-d \"foo=bar\"/", (string)$ini) == false');
assert('preg_match("/-d \"foo=foo\"/", (string)$ini)');

?>
===DONE===
--EXPECT--
===DONE===

