<?php

class Domain51_Test_Case_Parser
{
    public function __construct()
    {
        
    }
    
    public function parse($file)
    {
        $sections = array();
        $lines = file($file);
        $current_section = null;
        foreach ($lines as $line) {
            if (preg_match('/^--([^-]+)--$/', $line, $matches)) {
                $current_section = 'Domain51_Test_Section_' . ucfirst(strtolower($matches[1]));
                $sections[$current_section] = array();
                continue;
            }
            
            if (is_null($current_section)) {
                // nothing to do here yet
                continue;
            }
            
            $sections[$current_section][] = $line;
        }
        
        // @todo refactor so only one foreach is done
        foreach ($sections as $name => $data) {
            $sections[] = new $name(trim(implode("\n", $data)));
            unset($sections[$name]);
        }
        
        $list = new Domain51_Test_SectionList($sections);
        
        // @todo move this over to Domain51_Test_Case_Validator
        if (!$list->has('TEST')) {
            throw new Domain51_Test_Case_Parser_InvalidTestCaseException('missing TEST section');
        }
        
        if (!$list->has('FILE')) {
            throw new Domain51_Test_Case_Parser_InvalidTestCaseException('missing FILE section');
        }
        
        $list->FILE->filename = dirname($file) . '/' . basename($file, '.phpt') . '.php';
        
        return new Domain51_Test_Case($list);
    }
}

class Domain51_Test_Case_Parser_InvalidTestCaseException extends Exception { }