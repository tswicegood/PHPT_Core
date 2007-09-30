<?php

class Domain51_Test_Case_Parser
{
    public function __construct()
    {
        
    }
    
    public function parse($file)
    {
        $raw_sections = array();
        $lines = file($file);
        $section_name = '';
        $section_data = '';
        
        foreach ($lines as $line) {
            if (preg_match('/^--([^-]+)--$/', $line, $matches)) {
                if (!empty($section_name)) {
                    $raw_sections[] = new $section_name($section_data);
                }
                
                $section_name = 'Domain51_Test_Section_' . ucfirst(strtolower($matches[1]));
                $section_data = '';
                continue;
            }
            
            if (is_null($section_name)) {
                // nothing to do here yet
                continue;
            }
            
            if (!empty($section_data)) {
                $section_data .= "\n";
            }
            $section_data .= trim($line);
        }
        
        $sections = new Domain51_Test_SectionList($raw_sections);
        
        // @todo move this over to Domain51_Test_Case_Validator
        if (!$sections->has('TEST')) {
            throw new Domain51_Test_Case_Parser_InvalidTestCaseException('missing TEST section');
        }
        
        if (!$sections->has('FILE')) {
            throw new Domain51_Test_Case_Parser_InvalidTestCaseException('missing FILE section');
        }
        
        $sections->FILE->filename = dirname($file) . '/' . basename($file, '.phpt') . '.php';
        
        return new Domain51_Test_Case($sections);
    }
}

class Domain51_Test_Case_Parser_InvalidTestCaseException extends Exception { }