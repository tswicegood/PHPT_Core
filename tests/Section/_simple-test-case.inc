<?php

/**
 * Create a simple mock to remove behavior on construct/destruct of normal Case object
 */
class PHPT_SimpleTestCase extends PHPT_Case {
    public $filename = 'foobar.phpt';
    public $output = 'two';
    public $sections = array();
    public $leave_file = false;
    public function __construct() {
        $this->sections = new PHPT_SectionList(array());
    }
    public function __destruct() { }
}
