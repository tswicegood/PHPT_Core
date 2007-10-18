<?php

class PHPT_Reporter_Pear implements PHPT_Reporter
{
    protected $_failures = array();
    protected $_pass_total = 0;
    protected $_skip_total = 0;
    protected $_timer_start = null;
    
    public function __construct()
    {
        
    }
    
    public function onSuiteStart(PHPT_Suite $suite)
    {
        echo "Running {$suite->count()} tests\n";
        $this->_timer_start = time();
    }
    
    public function onSuiteEnd(PHPT_Suite $suite)
    {
        // @todo write a test for full time length
        $total_time = time() - $this->_timer_start;
        $hour = str_pad(floor($total_time / 60), 2, '0', STR_PAD_LEFT);
        $minute = str_pad($total_time % 60, 2, '0', STR_PAD_LEFT);
        
        $buffer = '';
        $buffer .= "TOTAL TIME {$hour}:{$minute}\n";
        $buffer .= "{$this->_pass_total} PASSED TESTS\n";
        $buffer .= "{$this->_skip_total} SKIPPED TESTS\n";
        if (count($this->_failures) > 0) {
            $buffer .= count($this->_failures) . " FAILED TESTS:\n";
            foreach ($this->_failures as $failure) {
                $buffer .= $failure . "\n";
            }
            file_put_contents('run-tests.log', $buffer);
            echo 'wrote log to "', realpath('run-tests.log'), "\"\n";
        }
        echo $buffer;
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
        echo "PASS {$case->name}[{$case->filename}]\n";
    }
    
    public function onCaseFail(PHPT_Case $case, PHPT_Case_FailureException $failure)
    {
        $this->_failures[] = $case->filename;
        echo "FAIL {$case->name}[{$case->filename}]\n";
    }
    
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto)
    {
        $this->_skip_total++;
        echo "SKIP {$case->name}[{$case->filename}](reason: {$veto->getMessage()})\n";
    }

}