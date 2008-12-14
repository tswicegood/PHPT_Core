--TEST--
Cases should pass regardless of EOL markers

This test pulls in a test from php-src that was causing problems and
uses it.
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Text();
$parser = new PHPT_Case_Parser();

$case = $parser->parse(dirname(__FILE__) . '/visibility_005.phpt.inc');
$case->run($reporter);
echo "\n";

?>
===DONE===
--CLEAN--
--EXPECT--
.
===DONE===

