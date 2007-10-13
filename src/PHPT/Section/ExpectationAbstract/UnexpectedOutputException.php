<?php

abstract class PHPT_Section_ExpectationAbstract_UnexpectedOutputException
    extends Exception
{
    protected $_wanted = null;
    protected $_actual = null;
    
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