--TEST--
Multiple values can be passed to the INI by separating values with a comma
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

PHPT_Registry::getInstance()->opts = array(
    'ini' => 'foo=bar, bar=foo',
);

$ini = new PHPT_Section_INI('');
assert('preg_match("/-d \"foo=bar\"/", (string)$ini)');
assert('preg_match("/-d \"bar=foo\"/", (string)$ini)');

?>
===DONE===
--EXPECT--
===DONE===

