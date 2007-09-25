<?php

class Domain51_Test_Section_Get implements Domain51_Test_Section_EnvModifier
{
    private $_data = '';
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function modifyEnv(Domain51_Test_Section_Env $env)
    {
        $env->data['QUERY_STRING'] = trim($this->_data);
        $env->data['REQUEST_METHOD'] = 'GET';
    }
}