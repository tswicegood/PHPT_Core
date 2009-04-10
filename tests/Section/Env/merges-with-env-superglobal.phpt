--TEST--
If any values are present in $_ENV superglobal, it merges with them with
the values in the ENV block taking priority.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$_ENV = array(
    'foo' => 'foo',
    'bar' => 'bar',
);

$env_data = <<<END
foo=bar
END;

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';

$env = new PHPT_Section_ENV($env_data);
$env->run($case);

$expected = array(
    'foo' => 'bar',
    'bar' => 'bar',
    'REDIRECT_STATUS' => '',
    'QUERY_STRING' => '',
    'PATH_TRANSLATED' => dirname(__FILE__) . '/foobar.phpt',
    'SCRIPT_FILENAME' => dirname(__FILE__) . '/foobar.phpt',
    'REQUEST_METHOD' => '',
    'CONTENT_TYPE' => '',
    'CONTENT_LENGTH' => '',
    'HTTP_COOKIE' => '',
    'PATH' => getenv('PATH'),
);

assert('$env->data == $expected');

?>
===DONE===
--EXPECT--
===DONE===
