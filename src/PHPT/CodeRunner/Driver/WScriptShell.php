<?php

class PHPT_CodeRunner_Driver_WScriptShell extends PHPT_CodeRunner_Driver_Abstract
{
    private $_process = null;

    public function validate() {
        return true;
    }

    public function run($filename)
    {
        $result = new PHPT_CodeRunner_Result();
        $result->filename = $this->filename = $filename;

        $this->_runCode();
        $this->_handleInput();

        $result->output = $this->_waitForAndRetrieveOutput();
        $result->exitcode = $this->_exitAndGetCode();

        return $result;
    }

    private function _runCode()
    {
        $com = new COM('WScript.Shell');
        $this->_process = $com->Exec($this->_commandFactory());
    }

    private function _handleInput() {
        if (is_null($this->stdin)) {
            return;
        }
        $this->_process->StdIn->Write((string)$this->stdin);
    }

    private function _waitForAndRetrieveOutput()
    {
        $timer = 0;
        while ($this->_process->status === 0) {
            if ($timer >= $this->timeout) {
                throw new PHPT_CodeRunner_TimeoutException($this->_caller);
            }
            usleep(100000);
            $timer = $timer + .1;
        }

        return $this->_process->StdOut->ReadAll();
    }

    private function _exitAndGetCode()
    {
        return $this->_process->ExitCode;
    }

    private function _commandFactory() {
        $command = new PHPT_CodeRunner_CommandLine($this);
        if (!empty($this->command_line)) {
            $command->executable = $this->command_line;
        }

        return 'cmd /C ' . $this->_buildEnvironmentString() . (string)$command;
    }

    private function _buildEnvironmentString()
    {
        $return = '';
        foreach ($this->environment as $key => $value) {
            $return .= "set {$key}={$value} & ";
        }
        return $return;
    }
}

