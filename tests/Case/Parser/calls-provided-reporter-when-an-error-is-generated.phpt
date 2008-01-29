--TEST--
If PHPT_Case_Parser::setReporter() has been called, any exceptions thrown
during parse() will be sent to its onParserError().
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../../_mock-reporter.inc';

$invalid_test_file = dirname(__FILE__) . '/invalid-test-case.phpt';
file_put_contents(
    $invalid_test_file,
    'this file should contain sections'
);

$reporter = new PHPT_Reporter_Foobar();

$parser = new PHPT_Case_Parser();
$parser->setReporter($reporter);

$parser->parse($invalid_test_file);

?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/invalid-test-case.phpt'); ?>
--EXPECT--
PHPT_Reporter_Foobar::onParserError was called
===DONE===

