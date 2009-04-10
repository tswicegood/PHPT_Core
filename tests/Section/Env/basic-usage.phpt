--TEST--
Domain51_Section_ENV handles the ENV block.  It parses key/value pairs from
the block, each line being a new pair, and makes those values available
via the data property.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

// setup - insure that $_ENV is empty
$_ENV = array();

$random = rand(100, 200);

$env_data = <<<END
foo=bar
random={$random}
has=extra=equals=signs
trims=this line and the next final blank line here    

END;

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';

$env = new PHPT_Section_ENV($env_data);
$env->run($case);
$expected = array(
    'foo' => 'bar',
    'random' => $random,
    'has' => 'extra=equals=signs',
    'trims' => 'this line and the next final blank line here',
    'REDIRECT_STATUS' => '',
    'QUERY_STRING' => '',
    'PATH_TRANSLATED' => $case->filename,
    'SCRIPT_FILENAME' => $case->filename,
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
