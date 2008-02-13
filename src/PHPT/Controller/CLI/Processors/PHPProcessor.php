<?php

class PHPT_Controller_CLI_Processors_PHPProcessor implements PHPT_Controller_CLI_Processor
{
    public function process(PHPT_Controller_CLI $cli)
    {
        $registry = PHPT_Registry::getInstance();
        if (isset($registry->opts['php'])) {
            $registry->php = $registry->opts['php'];
        }
        unset($registry);
    }
}

