--TEST--
If PHPT_Registry->opts['quick'] is true, but a given test fails the check run
by PHPT_Case_Validator_OutputBufferCompatible, it will still run using Proc driver
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

PHPT_Registry::getInstance()->opts = array('quick' => true);
$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_ARGS('foobar'),
    )),
    dirname(__FILE__) . '/foobar.phpt'
);

$factory = new PHPT_CodeRunner_Factory();
$runner = $factory->factory($case);

file_put_contents(dirname(__FILE__) . '/foobar.php', '<?php echo getmypid()');

$result = $runner->run(dirname(__FILE__) . '/foobar.php');
assert('$result->output != getmypid()');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===