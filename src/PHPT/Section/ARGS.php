<?php

class PHPT_Section_ARGS implements PHPT_Section
{
    private $_data = '';
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function __toString()
    {
        return ' -- ' . $this->_data;
    }
}
