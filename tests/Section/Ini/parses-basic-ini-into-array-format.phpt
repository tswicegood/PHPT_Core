--TEST--
Can take a basic ini format and parse it into an associative array
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$random = rand(100, 200);

$ini_data = <<<END
message=Hello World
random={$random}
END;

$ini = new PHPT_Section_INI($ini_data);
$ini->run(new PHPT_SimpleTestCase());

assert('$ini->data["message"] == "Hello World"');
assert('$ini->data["random"] == $random');

?>
===DONE===
--EXPECT--
===DONE===
