--TEST--
PHPT_AssertionHandler is instantiated with a title
and a ResultRecorder.  It then can have AssertionPacks added
to it which it uses to determine where to dispatch calls to
asssert*() methods.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class SimpleRecorder implements PHPT_ResultRecorder
{
    public function registerAssertionHandler(PHPT_AssertionHandler $handler)
    {
        echo "just registered: {$handler->name}\n";
    }
    
    public function onSuccess(PHPT_Assertion $assertion)
    {
        echo "passed: " . $assertion->getMessage() . "\n";
    }
    
    public function onFailure(PHPT_Assertion $assertion)
    {
        echo "failed: " . $assertion->getMessage() . "\n";
    }
}

$test = new PHPT_AssertionHandler('/tmp/easytest');
$test->registerRecorder(new SimpleRecorder());
$test->addAssertionPack(
    new PHPT_AssertionPacks_Basic()
);

$test->assertTrue(true);
$test->assertFalse(false);
$test->assertNull(null);
$test->assertType('array', array());
$test->assertEqual('123', 123);
$test->assertNotEqual('123', 321);
$test->assertIdentical('123', '123');
$test->assertNotIdentical('123', 123);
$test->assertRegExp('/.*/', '123');
$test->assertNotRegExp('/^$/', '123');

$test->assertTrue(!true);
$test->assertFalse(!false);
$test->assertNull(12);
$test->assertType('array', 'array');
$test->assertEqual('123', 321);
$test->assertNotEqual('123', 123);
$test->assertIdentical('123', 123);
$test->assertNotIdentical('123', '123');
$test->assertRegExp('/^$/', '123');
$test->assertNotRegExp('/.*/', '123');

?>
===DONE===
--EXPECT--
just registered: /tmp/easytest
passed: value [true] is true
passed: value [false] is false
passed: value [NULL] is null
passed: value [array()] is a type of array
passed: values ['123'] and [123] are equal
passed: values ['123'] and [321] are not equal
passed: values ['123'] and ['123'] are identical
passed: values ['123'] and [123] are not identical
passed: pattern ['/.*/'] is contained in value ['123']
passed: pattern ['/^$/'] is not contained in value ['123']
failed: value [false] is not true
failed: value [true] is not false
failed: value [12] is not null
failed: value ['array'] is not a type of array
failed: values ['123'] and [321] are not equal
failed: values ['123'] and [123] are equal
failed: values ['123'] and [123] are not identical
failed: values ['123'] and ['123'] are identical
failed: pattern ['/^$/'] is not contained in value ['123']
failed: pattern ['/.*/'] is contained in value ['123']
===DONE===
