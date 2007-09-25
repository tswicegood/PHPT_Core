<?php

class Domain51_Test_Section_Stdin implements Domain51_Test_Section
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