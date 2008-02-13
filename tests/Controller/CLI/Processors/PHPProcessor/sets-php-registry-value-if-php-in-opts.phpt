--TEST--
If "--php /path/to/php" is passed to PHPT when it runs, PHPProcessor will add
the "/path/to/php" value to the Registry
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../../_setup.inc';

$some_random_path = '/some/path/to/php-' . rand(100, 200);

PHPT_Registry::getInstance()->opts = array(
    'php' => $some_random_path,
);

assert('!isset(PHPT_Registry::getInstance()->php)');

$cli = new PHPT_Controller_CLI();
$processor = new PHPT_Controller_CLI_Processors_PHPProcessor();
$processor->process($cli);

assert('isset(PHPT_Registry::getInstance()->php)');
assert('PHPT_Registry::getInstance()->php == $some_random_path');

?>
===DONE===
--EXPECT--
===DONE===

