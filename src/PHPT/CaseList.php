<?php

class PHPT_CaseList implements Iterator, Countable
{
    private $_cases = array();
    private $_files = array();
    private $_parser = null;
    
    public function __construct(array $files)
    {
        $this->_files = $files;
        $this->_parser = new PHPT_Case_Parser();
    }
    
    public function count()
    {
        return count($this->_files);
    }
    
    public function current()
    {
        if (!isset($this->_cases[$this->key()])) {
            $this->_cases[$this->key()] = $this->_parser->parse(current($this->_files));
        }
        return $this->_cases[$this->key()];
    }
    
    public function key()
    {
        return key($this->_files);
    }
    
    public function next()
    {
        next($this->_files);
    }
    
    public function rewind()
    {
        reset($this->_files);
    }
    
    public function valid()
    {
        return current($this->_files) !== false;
    }
}