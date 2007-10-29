<?php

class PHPT_CodeRunner_Factory
{
    public function factory(PHPT_Case $case)
    {
        $reg = PHPT_Registry::getInstance();
        if (isset($reg->opts['quick'])) {
            $runner = new PHPT_CodeRunner('OutputBuffer');
        } else {
            $runner = new PHPT_CodeRunner();
        }
        if ($case->sections->has('ENV')) {
            $runner->environment = $case->sections->ENV->data;
        }
        if ($case->sections->has('INI')) {
            $runner->ini = (string)$case->sections->INI;
        }
        if ($case->sections->has('ARGS')) {
            $runner->args = (string)$case->sections->ARGS;
        }
        if ($case->sections->has('POST')) {
            $runner->post_filename = (string)$case->sections->POST->file;
        } elseif ($case->sections->has('POSTRAW')) {
            $runner->post_filename = (string)$case->sections->POSTRAW->file;
        }
        
        if ($case->is('CgiRequired')) {
            $runner->executable = isset(PHPT_Registry::getInstance()->cgi_executable) ?
                PHPT_Registry::getInstance()->cgi_executable :
                'php-cgi';
        }
        try {
            $runner->validate();
            return $runner;
        } catch (PHPT_CodeRunner_InvalidExecutableException $e) {
            throw new PHPT_Case_VetoException($e->getMessage());
        }
    }
}
