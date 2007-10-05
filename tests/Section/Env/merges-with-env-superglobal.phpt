--TEST--
If any values are present in $_ENV superglobal, it merges with them with
the values in the ENV block taking priority.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$_ENV = array(
    'foo' => 'foo',
    'bar' => 'bar',
);

$env_data = <<<END
foo=bar
END;

$env = new PHPT_Section_Env($env_data);

$expected = array(
    'foo' => 'bar',
    'bar' => 'bar',
    'REDIRECT_STATUS' => '',
    'QUERY_STRING' => '',
    'PATH_TRANSLATED' => '',
    'SCRIPT_FILENAME' => '',
    'REQUEST_METHOD' => '',
    'CONTENT_TYPE' => '',
    'CONTENT_LENGTH' => '',
    'HTTP_COOKIE' => '',
);
assert('$env->data == $expected');

?>
===DONE===
--EXPECT--
===DONE===
