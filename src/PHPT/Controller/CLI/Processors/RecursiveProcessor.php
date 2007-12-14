<?php

class PHPT_Controller_CLI_Processors_RecursiveProcessor implements PHPT_Controller_CLI_Processor
{
    public function process(PHPT_Controller_CLI $cli) 
    {
        $cli->recursive = isset(PHPT_Registry::getInstance()->opts['recursive']) || isset(PHPT_Registry::getInstance()->opts['r']);
    }
}

