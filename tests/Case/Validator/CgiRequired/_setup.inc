<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

class FoobarSectionList {
    public function has($name) {
        return isset($this->$name);
    }
}
class FoobarCase extends PHPT_Case {
    public $sections = null;
    public function __construct() {
        $this->sections = new FoobarSectionList();
    }
    public function __destruct() { }
}