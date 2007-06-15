--TEST--
Assertional will properly callback to the provided implementation of Test_Reporter
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/AssertionHandler.php';

class MyReporter implements Test_Reporter
{
    public $onSuccess = 0;
    public function onSuccess(Test_Assertion $assertion)
    {
        echo "PASS: {$assertion->getMessage()}\n";
        $this->onSuccess++;
    }
    
    public function onFailure(Test_Assertion $assertion)
    {
        echo "FAIL: {$assertion->getMessage()}\n";
    }
}

$reporter = new MyReporter();
$test = new Test_AssertionHandler($reporter);
$test->assertTrue(true);
$test->assertTrue(true, 'custom message...');

assert('$reporter->onSuccess == 2');
echo "complete";
?>
--EXPECT--
PASS: value [true] is true
PASS: custom message...
complete