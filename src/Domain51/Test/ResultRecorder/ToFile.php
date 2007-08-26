<?php

class Domain51_Test_ResultRecorder_ToFile implements Domain51_Test_ResultRecorder
{
    private $_dom = null;
    private $_file = null;
    private $_handler = null;
    
    public function __construct($test_case)
    {
        $this->_file = $test_case . '.results';
        touch($this->_file);
    }
    
    public function __destruct()
    {
        $this->finish();
    }
    
    public function registerAssertionHandler(Domain51_Test_AssertionHandler $handler)
    {
        $this->_handler = $handler;
        $this->_dom = new DOMDocument();
        $tests = $this->_dom->createElement('tests');
        $this->_dom->appendChild($tests);
    }
    
    public function finish()
    {
        $this->_dom->formatOutput = true;
        $this->_dom->save($this->_file);
    }
    
    public function onSuccess(Domain51_Test_Assertion $assertion)
    {
        $pass = $this->_dom->createElement('test');
        $name = $this->_dom->createElement('name');
        $status = $this->_dom->createElement('status');
        $message = $this->_dom->createElement('message');
        $name->nodeValue = 'assertTrue';
        $status->nodeValue = 'pass';
        $message->nodeValue = $assertion->getMessage();
        
        $pass->appendChild($name);
        $pass->appendChild($status);
        $pass->appendChild($message);
        $this->_dom->documentElement->appendChild($pass);
    }
    
    public function onFailure(Domain51_Test_Assertion $assertion)
    {
        $fail = $this->_dom->createElement('test');
        $name = $this->_dom->createElement('name');
        $status = $this->_dom->createElement('status');
        $message = $this->_dom->createElement('message');
        $name->nodeValue = 'assertTrue';
        $status->nodeValue = 'fail';
        $message->nodeValue = $assertion->getMessage();
        
        $fail->appendChild($name);
        $fail->appendChild($status);
        $fail->appendChild($message);
        $this->_dom->documentElement->appendChild($fail);
    }
}