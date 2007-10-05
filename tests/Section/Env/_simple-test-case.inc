<?php

/**
 * Create a simple mock to remove behavior on construct/destruct of normal Case object
 */
class PHPT_SimpleTestCase extends PHPT_Case {
    public $filename = '';
    public $sections = null;
    public function __construct()
    {
        $this->sections = new PHPT_SectionList(array());
    }
    public function __destruct() { }
}
