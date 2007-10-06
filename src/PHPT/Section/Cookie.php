<?php

class PHPT_Section_Cookie implements PHPT_Section_EnvModifier
{
    private $_data = '';
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function modifyEnv(PHPT_Section_Env $env, PHPT_Case $case)
    {
        $env->data['HTTP_COOKIE'] = (string)$this;
    }
    
    public function __toString()
    {
        return trim($this->_data);
    }
}
