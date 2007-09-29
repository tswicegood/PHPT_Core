<?php

class Domain51_Test_SectionList implements Iterator
{
    private $_raw_sections = array();
    private $_sections = array();
    
    public function __construct(array $sections = array())
    {
        foreach ($sections as $section) {
            if (!$section instanceof Domain51_Test_Section) {
                throw new Domain51_Test_SectionList_InvalidParameter();
            }
            $name = strtoupper(str_replace('Domain51_Test_Section_', '', get_class($section)));
            $this->_raw_sections[$name] = $section;
        }
        
        $this->_sections = $this->_raw_sections;
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
            return $this;
        }
        
        $full_interface = 'Domain51_Test_Section_' . $interface;
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
        return isset($this->_raw_sections[$name]);
    }
    
    public function __get($key)
    {
        return $this->_raw_sections[$key];
    }
}