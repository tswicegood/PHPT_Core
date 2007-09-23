<?php

class Domain51_Test_Section_Get implements Domain51_Test_Section, Domain51_Test_Section_EnvModifier
{
    private $_data = '';
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    /**
     * @internal This method is here to satisfy the {@link Domain51_Test_Section} interface.
     *           Section_Get's main purpose is modify the environment to insure the correct
     *           REQUEST_METHOD and a QUERY_STRING (if any) is in place.
     */
    public function run(Domain51_Test_Case $case)
    {
        
    }
    
    public function modifyEnv(Domain51_Test_Section_Env $env)
    {
        $env->data['QUERY_STRING'] = trim($this->_data);
    }
}