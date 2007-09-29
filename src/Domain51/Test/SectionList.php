<?php

class Domain51_Test_SectionList implements Iterator, ArrayAccess
{
    private $_sections = null;
    
    public function __construct(array $sections = array())
    {
        $this->_sections = $sections;
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
    
    public function offsetExists($key)
    {
        
    }
    
    public function offsetGet($key)
    {
        
    }
    
    public function offsetSet($key, $value)
    {
        
    }
    
    public function offsetUnset($key)
    {
        
    }
}