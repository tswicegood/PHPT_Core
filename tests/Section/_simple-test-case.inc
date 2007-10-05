<?php

/**
 * Create a simple mock to remove behavior on construct/destruct of normal Case object
 */
class PHPT_SimpleTestCase extends PHPT_Case {
    public $filename = '';
    public $output = null;
    public $sections = array();
    public function __construct() { }
    public function __destruct() { }
}
