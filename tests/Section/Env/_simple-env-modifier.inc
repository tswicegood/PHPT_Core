<?php

class PHPT_Section_SimpleEnvModifier implements PHPT_Section_EnvModifier
{
    public $key = '';
    public $value = '';
    
    public function __construct()
    {
        
    }
    
    public function modifyEnv(PHPT_Section_Env $env, PHPT_Case $case)
    {
        $env->data[$this->key] = $this->value;
    }
}
