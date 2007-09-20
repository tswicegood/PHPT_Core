--TEST--
Domain51_Test_ResultReader_FromFile can parse results recorded by
the ToFile recorder and turn them into a result object
--FILE--
<?php

require dirname(__FILE__) . '/../../_setup.inc';

$xml = <<< END
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
END;

$result_file = dirname(__FILE__) . '/temp-output.xml';
file_put_contents($result_file, $xml);

$reader = new Domain51_Test_ResultReader_FromFile();
$result = $reader->parse($result_file);

assert('$result instanceof Domain51_Test_Result');
assert('$result->count() == 4');
assert('$result->count("pass") == 2');
assert('$result->count("fail") == 2');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temp-output.xml'); ?>
--EXPECT--
===DONE===