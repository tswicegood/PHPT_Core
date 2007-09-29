<?php

class Domain51_Test_SectionList implements Iterator
{
    private $_raw_sections = null;
    private $_sections = null;
    
    public function __construct(array $sections = array())
    {
        $this->_sections = $this->_raw_sections = $sections;
    }
    
    public function current()
    {
        return current($this->_sections);
    }
    
    public function key()
    {
        return key($this->_sections);
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
            return;
        }
        
        $full_interface = 'Domain51_Test_Section_' . $interface;
        $this->_sections = array();
        foreach ($this->_raw_sections as $name => $section) {
            if (!$section instanceof $full_interface) {
                continue;
            }
            $this->_sections[$name] = $section;
        }
    }
}