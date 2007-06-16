--TEST--
Test_Assert_Type can determine if the provide $value is a integer, int, or long
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$known_aliases = array('int', 'integer', 'long');

foreach ($known_aliases as $type) {
    $assert = new Test_Assert_Type(null, $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type(true, $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type(false, $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type(array(), $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type(array(123, 321), $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type(array(123 => 321), $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type('some string', $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type('123', $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type(123, $type);
    assert('$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type(123.321, $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $obj = new Test_Assert_Type(true, $type);
    $assert = new Test_Assert_Type($obj, $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $filename = tempnam(sys_get_temp_dir(), '');
    $resource = fopen($filename, 'w');
    assert('is_resource($resource)');
    $assert = new Test_Assert_Type($resource, $type);
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    fclose($resource);
    unlink($filename);
}

?>
==DONE==
--EXPECT--
value [NULL] is not a [int]
value [true] is not a [int]
value [false] is not a [int]
value [array ( )] is not a [int]
value [array ( 0 => 123, 1 => 321, )] is not a [int]
value [array ( 123 => 321, )] is not a [int]
value ['some string'] is not a [int]
value ['123'] is not a [int]
value [123] is a [int]
value [123.321] is not a [int]
value [object: Test_Assert_Type] is not a [int]
value [resource] is not a [int]
value [NULL] is not a [integer]
value [true] is not a [integer]
value [false] is not a [integer]
value [array ( )] is not a [integer]
value [array ( 0 => 123, 1 => 321, )] is not a [integer]
value [array ( 123 => 321, )] is not a [integer]
value ['some string'] is not a [integer]
value ['123'] is not a [integer]
value [123] is a [integer]
value [123.321] is not a [integer]
value [object: Test_Assert_Type] is not a [integer]
value [resource] is not a [integer]
value [NULL] is not a [long]
value [true] is not a [long]
value [false] is not a [long]
value [array ( )] is not a [long]
value [array ( 0 => 123, 1 => 321, )] is not a [long]
value [array ( 123 => 321, )] is not a [long]
value ['some string'] is not a [long]
value ['123'] is not a [long]
value [123] is a [long]
value [123.321] is not a [long]
value [object: Test_Assert_Type] is not a [long]
value [resource] is not a [long]
==DONE==