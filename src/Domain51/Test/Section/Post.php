<?php

class Domain51_Test_Section_Post implements Domain51_Test_Section, Domain51_Test_Section_EnvModifier
{
    public $file = '';
    public $raw_data = '';
    
    public function __construct($data)
    {
        $this->file = uniqid();
        $this->raw_data = $data;
    }
    
    public function __destruct()
    {
        // surpress in case run() is never called
        @unlink($this->file);
    }
    
    public function run(Domain51_Test_Case $case)
    {
        file_put_contents($this->file, $this->raw_data);
    }
    
    public function modifyEnv(Domain51_Test_Section_Env $env)
    {
        
    }
}