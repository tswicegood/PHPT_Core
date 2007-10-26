<?php

class PHPT_Section_GET implements PHPT_Section_ENVModifier
{
    private $_data = '';
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function modifyEnv(PHPT_Section_ENV $env)
    {
        $env->data['QUERY_STRING'] = trim($this->_data);
        $env->data['REQUEST_METHOD'] = 'GET';
    }
}
