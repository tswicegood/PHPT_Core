<?php

class Domain51_Test_CodeRunner_Factory
{
    public function factory(Domain51_Test_Case $case)
    {
        $runner = new Domain51_Test_CodeRunner();
        if ($case->sections->has('ENV')) {
            $runner->environment = $case->sections->ENV->data;
        }
        if ($case->sections->has('INI')) {
            $runner->ini = (string)$case->sections->INI;
        }
        if ($case->sections->has('ARGS')) {
            $runner->args = (string)$case->sections->ARGS;
        }
        return $runner;
    }
}