--TEST--
Any sections that implement the PHPT_Section_RunnableBefore interface are run prior
to running the FILE section
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class PHPT_Section_SimpleBeforeOne implements PHPT_Section_RunnableBefore {
    public function run(PHPT_Case $case) {
        echo __CLASS__ . " called\n";
    }
    
    public function getPriority() { }
}

class PHPT_Section_SimpleBeforeTwo implements PHPT_Section_RunnableBefore {
    public function run(PHPT_Case $case) {
        echo __CLASS__ . " called\n";
    }
    
    public function getPriority() { }
}

$file = new PHPT_Section_FILE("Hello World!\n");
$file->filename = dirname(__FILE__) . '/fake-test-case.php';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_SimpleBeforeOne(),
        new PHPT_Section_SimpleBeforeTwo(),
        $file,
    )),
    dirname(__FILE__) . '/fake-test-case.phpt'
);

$case->run(new PHPT_Reporter_Null());
echo $case->output;

?>
===DONE===
--EXPECT--
PHPT_Section_SimpleBeforeOne called
PHPT_Section_SimpleBeforeTwo called
Hello World!
===DONE===
