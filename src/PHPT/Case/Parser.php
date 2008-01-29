<?php

class PHPT_Case_Parser
{
    private $_reporter = null;
    private $_validator = null;
    
    public function __construct()
    {
        $this->_validator = new PHPT_Case_Validator_Runnable();
    }

    public function setReporter($reporter)
    {
        $this->_reporter = $reporter;
    }
    
    public function parse($file)
    {
        try {
            return $this->_doParse($file);
        } catch (Exception $e) {
            if (is_null($this->_reporter)) {
                throw $e;
            }
            $this->_reporter->onParserError();
        }
    }

    private function _doParse($file)
    {
        $raw_sections = array();
        $lines = file($file);
        $section_name = '';
        $section_data = '';
        
        foreach ($lines as $line) {
            if (preg_match('/^--([^-]+)--$/', trim($line), $matches)) {
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
        if (!class_exists($object_name, true)) {
            throw new PHPT_Case_Parser_UnknownSectionName($name);
        }
        return new $object_name(rtrim($data));
    }
}

class PHPT_Case_Parser_UnknownSectionName extends Exception { }
