<?php

abstract class PHPT_Assert_SingleValueAbstract implements PHPT_Assertion
{
    protected $_message = '';
    protected $_value = null;
    
    public function __construct($value, $message = null)
    {
        $this->_value = $value;
        if (!is_null($message)) {
            $this->_message = $message;
        }
    }
        
    public function getMessage()
    {
        return sprintf(
            $this->_message,
            (string)new PHPT_Util_ValueDumper($this->_value),
            $this->getStatus() ? 'is' : 'is not'
        );
    }
}
