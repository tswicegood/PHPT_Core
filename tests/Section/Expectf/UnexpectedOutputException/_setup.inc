<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

class PHPT_SimpleTestCase extends PHPT_Case {
    public $output = 'two';
    public function __construct() { }
    public function __destruct() { }
}
