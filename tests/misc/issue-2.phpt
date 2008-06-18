--TEST--
PATH environment variable should be the same as the current PATH
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$contents = "--TEST--\n" .
            "foobar\n" .
            "--FILE--\n" .
            "<?php\n" .
            "echo getenv('PATH'), \"" . '\n' ."\"\n" .
            "?>\n" .
            "--EXPECTF--\n" .
            "%s";
$test_case_file = dirname(__FILE__) . '/foobar.phpt';
file_put_contents($test_case_file, $contents);

$parser = new PHPT_Case_Parser();
$case = $parser->parse($test_case_file);
$case->run(new PHPT_Reporter_Null());
assert('trim($case->result->output) == getenv("PATH")');

?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/foobar.phpt'); ?>
--EXPECT--
===DONE===

