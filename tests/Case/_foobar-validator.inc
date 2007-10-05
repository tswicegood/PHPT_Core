<?php

class FooBarValidator implements PHPT_Case_Validator
{
    public $return = true;
    public function validate(PHPT_Case $validate) {
        
    }
    
    public function is(PHPT_Case $case) {
        return $this->return;
    }
}
