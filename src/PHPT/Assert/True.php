<?php

class PHPT_Assert_True extends PHPT_Assert_SingleValueAbstract
{
    protected $_message = 'value [%s] %s true';
    protected $_value = null;
    
    public function getStatus()
    {
        return $this->_value == true;
    }
    
    public function getName()
    {
        return 'assertTrue';
    }
}
