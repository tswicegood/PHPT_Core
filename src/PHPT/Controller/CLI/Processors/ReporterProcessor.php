<?php

class PHPT_Controller_CLI_Processors_ReporterProcessor implements PHPT_Controller_CLI_Processor
{
    public function process(PHPT_Controller_CLI $cli)
    {
        $registry = PHPT_Registry::getInstance();
        $reporter_name = isset($registry->opts['reporter']) ? $registry->opts['reporter'] : 'Text';
        $quiet = isset($registry->opts['quiet']) || isset($registry->opts['q']);

        $real_reporter_name = 'PHPT_Reporter_' . $reporter_name;
        if ($quiet) {
            if (!class_exists($real_reporter_name . 'Quiet', true)) {
                echo "Error: No quiet {$reporter_name} reporter available", PHP_EOL;
            } else {
                $real_reporter_name .= 'Quiet';
            }
        }
        
        if (!class_exists($real_reporter_name, true)) {
            echo "Error: Unable to locate reporter {$reporter_name}", PHP_EOL;
            exit(101);
        }
        
        $cli->reporter = new $real_reporter_name();
        unset($registry);
    }
}

