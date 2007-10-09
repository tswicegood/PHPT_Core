<?php

class PHPT_CodeRunner_Factory
{
    public function factory(PHPT_Case $case)
    {
        $runner = new PHPT_CodeRunner();
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
            $runner->executable = 'php-cgi';
        }
        return $runner;
    }
}
