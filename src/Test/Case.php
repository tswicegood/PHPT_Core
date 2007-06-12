<?php

require_once 'Test/Runner.php';

class Test_Case
{
    private $_sections = array();
    private $_test_case = '';
    
    public function __construct($name = '', $test_case = '',  array $testInfo = array())
    {
        $this->_sections = $testInfo;
        $this->_test_case = $test_case;
    }
    
    public function run()
    {
        $source = $this->_test_case;
        foreach ($this->_sections as $section) {
            $source = $section->run($source);
        }
        
        Test_Runner::run($source);
    }
}