<?php

class PHPT_Section_STDIN implements PHPT_Section
{
    private $_data = null;
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function __toString()
    {
        return $this->_data;
    }
}
