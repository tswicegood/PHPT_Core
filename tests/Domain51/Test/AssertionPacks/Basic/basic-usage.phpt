--TEST--
Handles the basic set of assertions
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/AssertionPacks/Basic.php';

class SimpleRecorder
{
    public function onSuccess($assertion)
    {
        echo "passed: " . $assertion->getMessage() . "\n";
    }
    
    public function onFailure($assertion)
    {
        echo "failed: " . $assertion->getMessage() . "\n";
    }
}

$assertions = new Domain51_Test_AssertionPacks_Basic();
$assertions->registerRecorder(new SimpleRecorder());
$expected = array(
    'assertTrue',
    'assertFalse',
    'assertNull',
    'assertType',
    'assertEqual',
    'assertNotEqual',
    'assertIdentical',
    'assertNotIdentical',
    'assertRegExp',
    'assertNotRegExp',
);
assert('$assertions->declared() == $expected');

$assertions->assertTrue(true);
$assertions->assertFalse(false);
$assertions->assertNull(null);
$assertions->assertType('array', array());
$assertions->assertEqual('123', 123);
$assertions->assertNotEqual('123', 321);
$assertions->assertIdentical('123', '123');
$assertions->assertNotIdentical('123', 123);
$assertions->assertRegExp('/.*/', '123');
$assertions->assertNotRegExp('/^$/', '123');

$assertions->assertTrue(!true);
$assertions->assertFalse(!false);
$assertions->assertNull(12);
$assertions->assertType('array', 'array');
$assertions->assertEqual('123', 321);
$assertions->assertNotEqual('123', 123);
$assertions->assertIdentical('123', 123);
$assertions->assertNotIdentical('123', '123');
$assertions->assertRegExp('/^$/', '123');
$assertions->assertNotRegExp('/.*/', '123');

?>
===DONE===
--EXPECT--
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