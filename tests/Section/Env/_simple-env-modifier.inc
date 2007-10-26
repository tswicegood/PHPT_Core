<?php

class PHPT_Section_SimpleENVModifier implements PHPT_Section_ENVModifier
{
    public $key = '';
    public $value = '';
    
    public function __construct()
    {
        
    }
    
    public function modifyEnv(PHPT_Section_ENV $env)
    {
        $env->data[$this->key] = $this->value;
    }
}
