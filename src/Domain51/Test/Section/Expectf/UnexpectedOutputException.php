<?php

class Domain51_Test_Section_Expectf_UnexpectedOutputException extends Exception
{
    private $_wanted = null;
    private $_actual = null;
    
    public function __construct($wanted, $actual)
    {
        $this->_wanted = $wanted;
        $this->_actual = $actual;
    }
    
    public function __toString()
    {
        return (string)new Domain51_Test_Util_Diff($this->_wanted, $this->_actual);
    }
}