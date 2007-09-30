<?php

class Domain51_Test_Case_Parser
{
    private $_validator = null;
    
    public function __construct()
    {
        $this->_validator = new Domain51_Test_Case_Validator();
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
                    $section_object_name = 'Domain51_Test_Section_' . ucfirst(strtolower($section_name));
                    $raw_sections[$section_name] = new $section_object_name($section_data);
                    if ($section_name == 'FILE') {
                        $raw_sections[$section_name]->filename = dirname($file) . '/' . basename($file, '.phpt') . '.php';
                    }
                }
                
                $section_name = $matches[1];
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
        
        $case = new Domain51_Test_Case($sections);
        $this->_validator->validate($case);
        return $case;
    }
}
