<?php

class PHPT_Controller_CLI implements PHPT_Controller
{
    public function __construct()
    {
        
    }
    
    /**
     * @todo add support for "--quiet" - map to --report TextQuiet
     * @todo add support for $path being an actual file (instantiate Suite directly?)
     * @todo put every long-command into PHPT_Registry
     *
     * @todo refactor getopt parsing into another class
     * @todo add error handling when a requested reporter doesn't exist
     */
    public function run(array $options = array())
    {
        $reporter_name = 'Text';
        $reporter_found = false;
        
        foreach ($options as $key => $value) {
            if ($reporter_found) {
                $reporter_name = $value;
                $reporter_found = false;
                continue;
            }
            if ($value == '--reporter') {
                $reporter_found = true;
                continue;
            }
        }
        $recursive = in_array('--recursive', $options);
        
        $path = array_pop($options);
        $factory = new PHPT_Suite_Factory();
        $suite = $factory->factory($path, $recursive);
        
        $reporter_name = 'PHPT_Reporter_' . $reporter_name;
        $reporter = new $reporter_name();
        $suite->run($reporter);
    }
}
