<?php

class PHPT_Section_COOKIE implements PHPT_Section_ENVModifier, PHPT_Section_CgiExecutable
{
    private $_data = '';
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function modifyEnv(PHPT_Section_ENV $env)
    {
        $env->data['HTTP_COOKIE'] = (string)$this;
    }
    
    public function __toString()
    {
        return trim($this->_data);
    }
}
