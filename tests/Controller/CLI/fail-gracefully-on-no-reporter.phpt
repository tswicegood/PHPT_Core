--TEST--
If the reporter requested doesn't exist, fail gracefully

@todo check return code once RETURN/RETURNS section is implemented
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = rand(100, 200);
$opts = array(
    '--reporter',
    'UnknownAndUnknowable',// . $random,
    dirname(__FILE__) . '/../../../test-supporting/tests',
);

$controller = new PHPT_Controller_CLI();
$controller->run($opts);

?>
--EXPECT--
Error: Unable to locate reporter UnknownAndUnknowable
