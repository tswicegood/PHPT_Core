<?php

abstract class PHPT_Section_ExpectationAbstract implements PHPT_Section_RunAfter
{
    protected $_expected = null;
    private $_exception = 'PHPT_Section_%s_UnexpectedOutputException';
    
    public function __construct($data)
    {
        $this->_expected = $data;
        $exploded = explode('_', get_class($this));
        $this->_exception = sprintf($this->_exception, array_pop($exploded));
    }
    
    public function run(PHPT_Case $case)
    {
        if (!$this->_isValid($case)) {
            throw new $this->_exception(
                $case,
                $this->_expected
            );
        }

    }
    
    abstract protected function _isValid(PHPT_Case $case);
}
