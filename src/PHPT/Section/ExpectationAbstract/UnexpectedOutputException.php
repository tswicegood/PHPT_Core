<?php

abstract class PHPT_Section_ExpectationAbstract_UnexpectedOutputException
    extends PHPT_Case_FailureException
{
    protected $_wanted = null;
    protected $_actual = null;
    protected $_message = '';
    
    public function __construct(PHPT_Case $case, $reason)
    {
        $this->_wanted = $reason;
        $this->_actual = $case->output;
        parent::__construct($case, $this->_message);
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
