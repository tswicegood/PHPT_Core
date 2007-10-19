<?php

class PHPT_Controller_CLI implements PHPT_Controller
{
    public function __construct()
    {
        
    }
    
    /**
     * @todo add error handling when a requested reporter doesn't exist
     */
    public function run(array $options = array())
    {
        $path = array_pop($options);
        
        $opt_parser = new PHPT_Util_CLI_OptParser();
        $opt_parser->parse($options);
        
        $registry = PHPT_Registry::getInstance();
        $recursive = isset($registry->opts['recursive']);
        $reporter_name = isset($registry->opts['reporter']) ? $registry->opts['reporter'] : 'Text';
        $quiet = isset($registry->opts['quiet']);
        
        if (is_dir($path)) {
            $factory = new PHPT_Suite_Factory();
            $suite = $factory->factory($path, $recursive);
        } else {
            $suite = new PHPT_Suite(array($path));
        }
        
        $real_reporter_name = 'PHPT_Reporter_' . $reporter_name;
        if ($quiet) {
            if (!class_exists($real_reporter_name . 'Quiet', true)) {
                echo "Error: No quiet {$reporter_name} reporter available\n";
            } else {
                $real_reporter_name .= 'Quiet';
            }
        }
        $reporter = new $real_reporter_name();
        $suite->run($reporter);
    }
}
