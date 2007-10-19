<?php

class PHPT_Controller_CLI implements PHPT_Controller
{
    public function __construct()
    {
        
    }
    
    public function run(array $options = array())
    {
        $phpt = array_shift($options);
        if (basename($phpt) != 'phpt' && !is_null($phpt)) {
            // put it back on if it isn't "phpt"
            array_unshift($options, $phpt);
        }
        
        $path = array_pop($options);
        if (!is_file($path) && !is_dir($path)) {
            $options[] = $path;
            $path = getcwd();
        }
        
        $opt_parser = new PHPT_Util_CLI_OptParser();
        $opt_parser->parse($options);
        
        $registry = PHPT_Registry::getInstance();
        $recursive = isset($registry->opts['recursive']);
        $reporter_name = isset($registry->opts['reporter']) ? $registry->opts['reporter'] : 'Text';
        $quiet = isset($registry->opts['quiet']) || isset($registry->opts['q']);
        
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
        
        if (!class_exists($real_reporter_name, true)) {
            echo "Error: Unable to locate reporter {$reporter_name}\n";
            exit(101);
        }
        
        $reporter = new $real_reporter_name();
        $suite->run($reporter);
    }
}
