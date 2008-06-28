<?php

class PHPT_Reporter_Text implements PHPT_Reporter
{
    private $_total = null;
    private $_pass_total = 0;
    private $_skips = array();
    private $_failures = array();
    private $_errors = array();
    private $_start_time = null;
    private $_end_time = null;
    
    public function onSuiteStart(PHPT_Suite $suite)
    {
        echo "PHPT Test Runner v", PHPT_Framework::VERSION, PHP_EOL, PHP_EOL;
        $this->_start_time = microtime(true);
    }
    
    public function onSuiteEnd(PHPT_Suite $suite)
    {
        $this->_end_time = microtime(true);
        echo PHP_EOL, PHP_EOL;
        
        if (count($this->_skips) > 0) {
            echo "Skipped Cases:", PHP_EOL;
            foreach ($this->_skips as $file => $reason) {
                echo "    {$file} - {$reason}", PHP_EOL;
            }
            echo PHP_EOL;
        }
        
        if (count($this->_failures) > 0) {
            echo "Failed Cases:", PHP_EOL;
            foreach ($this->_failures as $file => $data) {
                echo "    {$file} - {$data['message']}", PHP_EOL;
                echo preg_replace('/^/m', '        ', $data['diff']);
                echo PHP_EOL, PHP_EOL;
            }
        }

        if (count($this->_errors) > 0) {
            echo "Cases with Errors:", PHP_EOL;
            foreach ($this->_errors as $error) {
                echo "    {$error['file']} - {$error['exception']->getMessage()}", PHP_EOL;
            }
            echo PHP_EOL;
        }
        
        printf(
            "Test Cases Run: %d, Passes: %d, Failures: %d, Errors: %d, Skipped: %d" . PHP_EOL,
            $this->_total,
            $this->_pass_total,
            count($this->_failures),
            count($this->_errors),
            count($this->_skips)
        );

        $this->_outputTestTime();
    }

    private function _outputTestTime()
    {
        $seconds = floor($this->_end_time - $this->_start_time);
        $minutes = floor($seconds / 60);
        if ($minutes < 0) {
            $minutes = '00';
        }
        $seconds = ($this->_end_time - $this->_start_time) % 60;
        printf(
            "Total Test Time: %s:%s" . PHP_EOL,
            str_pad($minutes, 2, '0', STR_PAD_LEFT),
            str_pad($seconds, 2, '0', STR_PAD_LEFT)
        );
    }
    
    public function onCaseStart(PHPT_Case $case)
    {
        
    }
    
    public function onCaseEnd(PHPT_Case $case)
    {
        
    }
    
    public function onCasePass(PHPT_Case $case)
    {
        $this->_pass_total++;
        $this->_output('.');
    }
    
    public function onCaseFail(PHPT_Case $case, PHPT_Case_FailureException $failure)
    {
        $this->_failures[$case->filename] = array(
            'message' => $failure->getMessage(),
            'diff' => $failure->getReason(),
        );
        $this->_output('F');
    }
    
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto)
    {
        $this->_skips[$case->filename] = $veto->getMessage();
        $this->_output('S');
    }

    public function onParserError(Exception $exception)
    {
        $this->_addExceptionToErrorStack($exception);
        $this->_output('E');
    }

    private function _addExceptionToErrorStack(Exception $exception)
    {
        $callTrace = array_shift($exception->getTrace());
        $this->_errors[] = array(
            'file' => $callTrace['file'],
            'exception' => $exception,
        );
    }
    
    private function _output($string) {
        if ($this->_total > 0 && $this->_total % 80 == 0) {
            echo PHP_EOL;
        }
        
        echo $string;
        $this->_total++;
    }
}
