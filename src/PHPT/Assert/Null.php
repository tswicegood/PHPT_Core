<?php

class PHPT_Assert_Null extends PHPT_Assert_SingleValueAbstract
{
    protected $_message = 'value [%s] %s null';
    
    public function getStatus()
    {
        return is_null($this->_value);
    }
    
    public function getName()
    {
        return 'assertNull';
    }
}
