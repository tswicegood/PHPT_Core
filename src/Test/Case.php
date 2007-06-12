<?php

require_once 'Test/Runner.php';

class Test_Case
{
    private $_data = array();
    
    public function __construct($name = '', array $testInfo = array())
    {
        $this->_data = $testInfo;
    }
    
    public function run()
    {
        $source = $this->_data['file'];
        preg_match('/^(<\?php)?(.*)\?>$/', $this->_data['setup'], $matches);
        $source = preg_replace('/^(<\?php)(.*)$/', '\1' . $matches[2] . '\2', $source);
        
        unset($matches);
        preg_match('/^<\?php(.*)\?>$/', $this->_data['teardown'], $matches);
        $source = preg_replace('/^(.*)\?>$/', '\1' . $matches[1] . '?>', $source);
        
        Test_Runner::run($source);
    }
    
}