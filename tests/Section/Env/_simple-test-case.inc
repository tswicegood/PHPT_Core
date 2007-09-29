<?php

/**
 * Create a simple mock to remove behavior on construct/destruct of normal Case object
 */
class Domain51_Test_SimpleTestCase extends Domain51_Test_Case {
    public $filename = '';
    public $sections = null;
    public function __construct()
    {
        $this->sections = new Domain51_Test_SectionList(array());
    }
    public function __destruct() { }
}
