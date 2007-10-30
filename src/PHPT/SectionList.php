<?php

class PHPT_SectionList implements Iterator
{
    private $_raw_sections = array();
    private $_sections = array();
    private $_section_map = array();
    private $_key_map = array();
    
    public function __construct(array $sections = array())
    {
        foreach ($sections as $section) {
            if (!$section instanceof PHPT_Section) {
                throw new PHPT_SectionList_InvalidParameter();
            }
            $name = strtoupper(str_replace('PHPT_Section_', '', get_class($section)));
            $key = $section instanceof PHPT_Section_Runnable ? $section->getPriority() . '.' . $name : $name;
            $this->_raw_sections[$key] = $section;
            $this->_section_map[$name] = $key;
            $this->_key_map[$key] = $name;
        }
        
        ksort($this->_raw_sections);
        
        $this->_sections = $this->_raw_sections;
    }
    
    public function current()
    {
        return current($this->_sections);
    }
    
    public function key()
    {
        return $this->_key_map[key($this->_sections)];
    }
    
    public function next()
    {
        next($this->_sections);
    }
    
    public function rewind()
    {
        reset($this->_sections);
    }
    
    public function valid()
    {
        return current($this->_sections) !== false;
    }
    
    public function filterByInterface($interface = null)
    {
        if (is_null($interface)) {
            $this->_sections = $this->_raw_sections;
            return $this;
        }
        
        $full_interface = 'PHPT_Section_' . $interface;
        $this->_sections = array();
        foreach ($this->_raw_sections as $name => $section) {
            if (!$section instanceof $full_interface) {
                continue;
            }
            $this->_sections[$name] = $section;
        }
        
        return $this;
    }
    
    public function has($name)
    {
        if (!isset($this->_section_map[$name])) {
            return false;
        }
        return isset($this->_raw_sections[$this->_section_map[$name]]);
    }
    
    public function __get($key)
    {
        return $this->_raw_sections[$this->_section_map[$key]];
    }
}
