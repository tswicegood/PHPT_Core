--TEST--
The ToFile result recorder records all of the results passed into it
to the file it was instantiated with.  The results can then be parsed
by another process to determine what happened.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$result_file = __FILE__ . '.results';
@unlink($result_file);
assert('!file_exists($result_file)');

$recorder = new PHPT_ResultRecorder_ToFile(__FILE__);

// creates empty file on start up
assert('file_exists($result_file)');
assert('filesize($result_file) == 0');

$handler = new PHPT_AssertionHandler(__FILE__);
$handler->addAssertionPack(new PHPT_AssertionPacks_Basic());

$handler->registerRecorder($recorder);
$handler->assertTrue(true);
$handler->assertTrue(false);
$handler->assertFalse(true);
$handler->assertFalse(false);
$handler->finish();

echo file_get_contents($result_file);

?>
===DONE===
--CLEAN--
<?php
    @unlink(str_replace('.clean.', '.', __FILE__) . '.results');
?>
--EXPECT--
<?xml version="1.0"?>
<tests>
  <test>
    <name>assertTrue</name>
    <status>pass</status>
    <message>value [true] is true</message>
  </test>
  <test>
    <name>assertTrue</name>
    <status>fail</status>
    <message>value [false] is not true</message>
  </test>
  <test>
    <name>assertFalse</name>
    <status>fail</status>
    <message>value [true] is not false</message>
  </test>
  <test>
    <name>assertFalse</name>
    <status>pass</status>
    <message>value [false] is false</message>
  </test>
</tests>
===DONE===
