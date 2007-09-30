--TEST--
Any sections that implement the Domain51_Test_Section_RunBefore interface are run prior
to running the FILE section
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class Domain51_Test_Section_SimpleBeforeOne implements Domain51_Test_Section_RunBefore {
    public function run(Domain51_Test_Case $case) {
        echo __CLASS__ . " called\n";
    }
}

class Domain51_Test_Section_SimpleBeforeTwo implements Domain51_Test_Section_RunBefore {
    public function run(Domain51_Test_Case $case) {
        echo __CLASS__ . " called\n";
    }
}

$file = new Domain51_Test_Section_File("Hello World!\n");
$file->filename = dirname(__FILE__) . '/fake-test-case.php';

$case = new Domain51_Test_Case(
    new Domain51_Test_SectionList(array(
        new Domain51_Test_Section_SimpleBeforeOne(),
        new Domain51_Test_Section_SimpleBeforeTwo(),
        $file,
    ))
);

$case->run();
echo $case->output;

?>
===DONE===
--EXPECT--
Domain51_Test_Section_SimpleBeforeOne called
Domain51_Test_Section_SimpleBeforeTwo called
Hello World!
===DONE===