<?php

class Domain51_Test_Section_Cookie implements Domain51_Test_Section, Domain51_Test_Section_EnvModifier
{
    private $_data = '';
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function run(Domain51_Test_Case $case)
    {
        
    }
    
    public function modifyEnv(Domain51_Test_Section_Env $env)
    {
        $env->data['HTTP_COOKIE'] = (string)$this;
    }
    
    public function __toString()
    {
        return trim($this->_data);
    }
}