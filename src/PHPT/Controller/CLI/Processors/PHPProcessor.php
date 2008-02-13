<?php

class PHPT_Controller_CLI_Processors_PHPProcessor
{
    public function process()
    {
        PHPT_Registry::getInstance()->php = PHPT_Registry::getInstance()->opts['php'];
    }
}

