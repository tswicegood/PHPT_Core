<?php

class PHPT_Assert_RegExp implements PHPT_Assertion
{
    private $_pattern = null;
    private $_value = null;
    private $_message = 'pattern [%1$s] %3$s contained in value [%2$s]';
    
    protected $_comparison = array(
        0 => 'is not',
        1 => 'is',
    );
    
    public function __construct($pattern, $value, $message = null)
    {
        $this->_pattern = $pattern;
        $this->_value = $value;
        
        if (!is_null($message)) {
            $this->_message = $message;
        }
    }
    
    public function getStatus()
    {
        return preg_match($this->_pattern, $this->_value);
    }
    
    public function getMessage()
    {
        $status = $this->getStatus();
        return sprintf(
            $this->_message,
            $this->_exportPattern(),
            (string)new PHPT_Util_ValueDumper($this->_value),
            $this->_comparison[(int)$status]
        );
    }
    
    public function getName()
    {
        return 'assertRegExp';
    }
    
    private function _exportPattern()
    {
        return stripslashes(
            var_export(
                $this->_pattern,
                true
            )
        );
    }
}
