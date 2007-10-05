<?php

class PHPT_Section_Get implements PHPT_Section_EnvModifier
{
    private $_data = '';
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function modifyEnv(PHPT_Section_Env $env)
    {
        $env->data['QUERY_STRING'] = trim($this->_data);
        $env->data['REQUEST_METHOD'] = 'GET';
    }
}
