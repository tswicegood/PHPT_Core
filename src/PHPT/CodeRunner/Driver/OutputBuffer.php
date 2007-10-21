<?php

class  PHPT_CodeRunner_Driver_OutputBuffer extends PHPT_CodeRunner_Driver_Abstract
{
    
    public function run($filename)
    {
        ob_start();
        include $filename;
        $buffer = ob_get_clean();
        
        $result = new PHPT_CodeRunner_Result();
        $result->filename = $filename;
        $result->output = $buffer;
        
        return $result;
    }
    
    public function validate()
    {
        
    }
}
