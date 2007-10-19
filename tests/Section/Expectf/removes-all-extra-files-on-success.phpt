--TEST--
If run() is successful, it will remove any files that are equal to the Case's filename
with a further extension added to it
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';

for ($i = 0; $i < 5; $i++) {
    touch(dirname(__FILE__) . '/foobar.phpt.' . rand(100, 200));
}

$case->output = 'foobar';

$section = new PHPT_Section_Expectf('foobar');
$section->run($case);

$count = 0;
foreach (scandir(dirname(__FILE__)) as $file) {
    if (substr($file, 0, 12) == 'foobar.phpt.') {
        $count++;
    }
}

assert('$count == 0');

?>
===DONE===
--EXPECT--
===DONE===