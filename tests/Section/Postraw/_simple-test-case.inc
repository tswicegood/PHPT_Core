<?php

/**
 * Create a simple mock to remove behavior on construct/destruct of normal Case object
 */
class Domain51_Test_SimpleTestCase extends Domain51_Test_Case {
    public $filename = '';
    public $sections = array();
    public function __construct() { }
    public function __destruct() { }
}
