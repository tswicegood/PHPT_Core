--TEST--
Reporter_Text includes a "Total Test Time MM:SS" line at the end
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$str = "--TEST--\n" .
       "simply waits for one second\n" .
       "--FILE--\n" .
       "<?php sleep(1); ?>\n" .
       "===DONE===\n" .
       "--EXPECT--\n" .
       "===DONE===";

file_put_contents(dirname(__FILE__) . '/foobar.phpt', $str);

$options = array(
    '/path/to/phpt',
    '--quick',
    dirname(__FILE__) . '/foobar.phpt',
);

$controller = new PHPT_Controller_CLI();
$controller->run($options);

?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/foobar.phpt'); ?>
--EXPECTREGEX--
/.*Total Test Time: 00:0[12].*/
===DONE===

