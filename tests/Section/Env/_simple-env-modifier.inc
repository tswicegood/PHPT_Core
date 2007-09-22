<?php

class Domain51_Test_Section_SimpleEnvModifier implements Domain51_Test_Section_EnvModifier
{
    public $key = '';
    public $value = '';
    
    public function __construct()
    {
        
    }
    
    public function modifyEnv(Domain51_Test_Section_Env $env)
    {
        $env->data[$this->key] = $this->value;
    }
}