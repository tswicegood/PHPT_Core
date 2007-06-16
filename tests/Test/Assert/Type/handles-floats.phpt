--TEST--
Test_Assert_Type can determine if the provide $value is a float, double, or real
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$known_aliases = array('float', 'double', 'real');

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
    assert('!$assert->getStatus()');
    echo $assert->getMessage() . "\n";
    
    $assert = new Test_Assert_Type(123.321, $type);
    assert('$assert->getStatus()');
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
value [NULL] is not a [float]
value [true] is not a [float]
value [false] is not a [float]
value [array ( )] is not a [float]
value [array ( 0 => 123, 1 => 321, )] is not a [float]
value [array ( 123 => 321, )] is not a [float]
value ['some string'] is not a [float]
value ['123'] is not a [float]
value [123] is not a [float]
value [123.321] is a [float]
value [object: Test_Assert_Type] is not a [float]
value [resource] is not a [float]
value [NULL] is not a [double]
value [true] is not a [double]
value [false] is not a [double]
value [array ( )] is not a [double]
value [array ( 0 => 123, 1 => 321, )] is not a [double]
value [array ( 123 => 321, )] is not a [double]
value ['some string'] is not a [double]
value ['123'] is not a [double]
value [123] is not a [double]
value [123.321] is a [double]
value [object: Test_Assert_Type] is not a [double]
value [resource] is not a [double]
value [NULL] is not a [real]
value [true] is not a [real]
value [false] is not a [real]
value [array ( )] is not a [real]
value [array ( 0 => 123, 1 => 321, )] is not a [real]
value [array ( 123 => 321, )] is not a [real]
value ['some string'] is not a [real]
value ['123'] is not a [real]
value [123] is not a [real]
value [123.321] is a [real]
value [object: Test_Assert_Type] is not a [real]
value [resource] is not a [real]
==DONE==