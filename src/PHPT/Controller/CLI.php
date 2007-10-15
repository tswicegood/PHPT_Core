<?php

class PHPT_Controller_CLI implements PHPT_Controller
{
    public function __construct()
    {
        
    }
    
    /**
     * @todo add support for "--quiet"
     * @todo add support for "--reporter"
     * @todo add support for $path being an actual file (instantiate Suite directly?)
     */
    public function run(array $options = array())
    {
        $recursive = in_array('--recursive', $options);
        $path = array_pop($options);
        $factory = new PHPT_Suite_Factory();
        $suite = $factory->factory($path, $recursive);
        
        $reporter = new PHPT_Reporter_Text();
        $suite->run($reporter);
    }
}
