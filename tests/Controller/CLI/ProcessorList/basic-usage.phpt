--TEST--
PHPT_Controller_CLI_ProcessorList->toArray() always returns an array containing
the number of classes that are delcared in the PHPT/Controller/CLI/Processors/*
directory.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

// @todo refactor this code so it isn't so ugly
$php_contents = '';
$reflection = new ReflectionClass('PHPT_Controller_CLI_ProcessorList');
$directory_iterator = new DirectoryIterator(dirname($reflection->getFileName()) . '/Processors');
foreach ($directory_iterator as $file) {
    if ($file->isDot() || !preg_match('/.*Processor.php$/', $file->getFilename())) {
        continue;
    }
    $php_contents .= file_get_contents($file->getRealPath());
}
preg_match_all('/^class .*implements .*PHPT_Controller_CLI_Processor.*$/m', $php_contents, $matches);
$processor_count = count($matches[0]);

$list = new PHPT_Controller_CLI_ProcessorList();
assert('count(new PHPT_Controller_CLI_ProcessorList()) == $processor_count');

?>
===DONE===
--EXPECT--
===DONE===

