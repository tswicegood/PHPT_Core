--TEST--
The ToFile result recorder records all of the results passed into it
to the file it was instantiated with.  The results can then be parsed
by another process to determine what happened.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(
    dirname(__FILE__) . '/../../../../../src/' . PATH_SEPARATOR .
    get_include_path()
);
// END REMOVE

require_once 'Domain51/Loader.php';

$result_file = __FILE__ . '.results';
assert('!file_exists($result_file)');

$recorder = new Domain51_Test_ResultRecorder_ToFile(__FILE__);

// creates empty file on start up
assert('file_exists($result_file)');
assert('filesize($result_file) == 0');

$handler = new Domain51_Test_AssertionHandler(__FILE__);
$handler->addAssertionPack(new Domain51_Test_AssertionPacks_Basic());

$handler->registerRecorder($recorder);
$handler->assertTrue(true);
$handler->assertTrue(false);
$handler->finish();

echo file_get_contents($result_file);

?>
===DONE===
--CLEAN--
<?php
    unlink(str_replace('.clean.', '.', __FILE__) . '.results');
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
</tests>
===DONE===