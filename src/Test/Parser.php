<?php

require_once 'Test/Case.php';
require_once 'Test/File.php';

class Test_Parser
{
    public function __construct()
    {
        
    }
    
    public function parse($filename)
    {
        $contents = explode("\n", file_get_contents($filename));
        $test_name = '';
        $test_case = '';
        $section_contents = array();
        
        
        $section = null;
        foreach ($contents as $line_num => $line) {
            if (preg_match('/^--([A-Z_]+)--$/', $line, $matches)) {
                $section = $matches[1];
                continue;
            }
            
            switch ($section) {
                case 'TEST' :
                    $test_name = empty($test_name) ? $line : implode("\n", array($test_name, $line));
                    break;
                
                case 'FILE' :
                    $test_case = empty($test_case) ? $line : implode("\n", array($test_case, $line));
                    break;
                
                default:
                    $section_contents[$section] = empty($section_contents[$section]) ?
                        $line :
                        implode("\n", array($section_contents[$section], $line));
                    break;
            }
        }
        
        $sections = array();
        foreach ($section_contents as $name => $contents) {
            $obj_name = 'Test_Section_' . ucfirst(strtolower($name));
            require_once str_replace('_', '/', $obj_name) . '.php';
            $sections[$name] = new $obj_name($contents);
        }
        
        return new Test_Case($test_name, $test_case, $sections);
    }
}