--TEST--
Any sections that implement the PHPT_Section_RunAfter interface are run prior
to running the FILE section
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class PHPT_Section_SimpleAfterOne implements PHPT_Section_RunAfter {
    public function run(PHPT_Case $case) {
        echo __CLASS__ . " called\n";
    }
}

class PHPT_Section_SimpleAfterTwo implements PHPT_Section_RunAfter {
    public function run(PHPT_Case $case) {
        echo __CLASS__ . " called\n";
    }
}

$file = new PHPT_Section_File("Hello World!\n");
$file->filename = dirname(__FILE__) . '/fake-test-case.php';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_SimpleAfterOne(),
        new PHPT_Section_SimpleAfterTwo(),
        $file,
    )),
    dirname(__FILE__) . '/fake-test-case.phpt'
);

$case->run(new PHPT_Reporter_Null());
echo $case->output;

?>
===DONE===
--EXPECT--
PHPT_Section_SimpleAfterOne called
PHPT_Section_SimpleAfterTwo called
Hello World!
===DONE===
