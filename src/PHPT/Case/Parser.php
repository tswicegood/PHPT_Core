<?php

class PHPT_Case_Parser
{
    private $_validator = null;
    
    public function __construct()
    {
        $this->_validator = new PHPT_Case_Validator_Runnable();
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
                    $raw_sections[$section_name] = $this->_createSection($section_name, $section_data);
                }
                
                $section_name = $matches[1];
                $section_data = '';
                continue;
            }
            
            if (is_null($section_name)) {
                // nothing to do here yet
                continue;
            }
            
            $section_data .= $line;
        }
        
        // set the last section
        $raw_sections[$section_name] = $this->_createSection($section_name, $section_data);
        
        $sections = new PHPT_SectionList($raw_sections);
        
        $case = new PHPT_Case($sections, $file);
        $case->validate('Runnable');
        return $case;
    }
    
    private function _createSection($name, $data)
    {
        $object_name = 'PHPT_Section_' . $name;
        return new $object_name(rtrim($data));
    }
}
