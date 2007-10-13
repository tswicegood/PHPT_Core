<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class PHPT_SimpleTestCase extends PHPT_Case {
    public $filename = '';
    public function __construct() { }
    public function __destruct() { }
}

class PHPT_SimpleFailureException extends PHPT_Case_FailureException {
    public function getDiff() {
        return (string)new PHPT_Util_Diff('one', 'two');
    }
}
