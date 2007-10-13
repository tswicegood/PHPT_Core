<?php

abstract class PHPT_Section_ExpectationAbstract_UnexpectedOutputException
    extends PHPT_Case_FailureException
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
        return $this->getDiff();
    }
    
    public function getDiff()
    {
        return (string)new PHPT_Util_Diff($this->_wanted, $this->_actual);
    }
}