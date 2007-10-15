<?php

class PHPT_Reporter_Text implements PHPT_Reporter
{
    private $_total = null;
    private $_pass_total = 0;
    private $_skips = array();
    private $_failures = array();
    
    // @todo remove hard-coded version #
    public function onSuiteStart(PHPT_Suite $suite)
    {
        echo "PHPT Test Runner v0.1\n\n";
    }
    
    public function onSuiteEnd(PHPT_Suite $suite)
    {
        echo "\n\n";
        
        if (count($this->_skips) > 0) {
            echo "Skipped Cases:\n";
            foreach ($this->_skips as $file => $reason) {
                echo "    {$file} - {$reason}\n";
            }
            echo "\n";
        }
        
        if (count($this->_failures) > 0) {
            echo "Failed Cases:\n";
            foreach ($this->_failures as $file => $data) {
                echo "    {$file} - {$data['message']}\n";
                echo preg_replace('/^/m', '        ', $data['diff']);
                echo "\n\n";
            }
        }
        
        printf(
            "Test Cases Run: %d, Passes: %d, Failures: %d, Skipped: %d\n",
            $this->_total,
            $this->_pass_total,
            count($this->_failures),
            count($this->_skips)
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
            'diff' => $failure->getDiff(),
        );
        $this->_output('F');
    }
    
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto)
    {
        $this->_skips[$case->filename] = $veto->getMessage();
        $this->_output('S');
    }
    
    private function _output($string) {
        if ($this->_total > 0 && $this->_total % 80 == 0) {
            echo "\n";
        }
        
        echo $string;
        $this->_total++;
    }
}
