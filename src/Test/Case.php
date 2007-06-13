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
            if ($section->type == 'modify') {
                $source = $section->run($source);
            }
        }
        
        $file = new Test_File(tempnam(sys_get_temp_dir(), ''), $source);
        Test_Runner::run($file);
        $file->remove();
    }
}