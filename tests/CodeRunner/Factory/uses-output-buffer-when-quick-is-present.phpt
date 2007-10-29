--TEST--
If PHPT_Registry->opts['quick'] is present and true, use CodeRunner_Driver_OutputBuffer
--ARGS--
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

PHPT_Registry::getInstance()->opts = array('quick' => true);

class PHPT_SimpleTestCase extends PHPT_Case {
    public function __construct() {
        $this->sections = new PHPT_SectionList();
    }
    public function __destruct() { }
    public function is() {
        return true;
    }
}

$factory = new PHPT_CodeRunner_Factory();
$runner = $factory->factory(new PHPT_SimpleTestCase());

file_put_contents(dirname(__FILE__) . '/foobar.php', '<?php echo getmypid(); ?>');

$result = $runner->run(dirname(__FILE__) . '/foobar.php');
assert('getmypid() == $result->output');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===