<?php

class PHPT_SimpleTestCase extends PHPT_Case {
    public $filename = '';
    public $name = '';
    public function __construct() { }
    public function __destruct() { }
}

class PHPT_SimpleFailureException extends PHPT_Case_FailureException {
    public function __construct($msg = '') {
        parent::__construct(new PHPT_SimpleTestCase(), $msg);
    }
    public function getDiff() {
        return (string)new PHPT_Util_Diff('one', 'two');
    }
}

class PHPT_SimpleSuite extends PHPT_Suite
{
    public $count = 0;
    public function __construct() { }
    public function __destruct() { }
    
    public function count() {
        return $this->count;
    }
}
