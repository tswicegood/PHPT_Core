--TEST--
PATH environment variable should be the same as the current PATH
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$contents = "--TEST--" . PHP_EOL .
            "foobar" . PHP_EOL .
            "--FILE--" . PHP_EOL .
            "<?php" . PHP_EOL .
            "echo getenv('PATH'), PHP_EOL;" . PHP_EOL .
            "?>" . PHP_EOL .
            "--EXPECTF--" . PHP_EOL .
            "%s";
$test_case_file = dirname(__FILE__) . '/foobar.phpt';
file_put_contents($test_case_file, $contents);

$parser = new PHPT_Case_Parser();
$case = $parser->parse($test_case_file);
$case->run(new PHPT_Reporter_Null());
assert('trim($case->result->output) == trim(getenv("PATH"))');

?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/foobar.phpt'); ?>
--EXPECT--
===DONE===

