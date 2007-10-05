<?php

class PHPT_Section_Expectregex_UnexpectedOutputException extends Exception
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
        return (string)new PHPT_Util_Diff($this->_wanted, $this->_actual);
    }
}
