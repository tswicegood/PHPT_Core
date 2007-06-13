<?php

require_once 'Test/Runner.php';

class Test_Case
{
    private $_sections = array();
    private $_contents = '';
    private $_name = '';
    
    public function __construct($name, $test_case,  array $testInfo)
    {
        $this->_sections = $testInfo;
        $this->_contents = $test_case;
        $this->_name = $name;
    }
    
    public function __get($key)
    {
        $key = "_{$key}";
        return $this->$key;
    }
    
    public function run()
    {
        $source = $this->_contents;
        foreach ($this->_sections as $section) {
            if ($section->type == 'modify') {
                $source = $section->run($source);
            }
        }
        
        $file = new Test_File(tempnam(sys_get_temp_dir(), ''), $source);
        Test_Runner::run($file);
        $file->remove();
        return true;
    }
}