--TEST--
If a RETURNS section's data matches the exitcode by of the Case's result, this
does not
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$exit_code = rand(10, 20);
$php_code = '<?php exit(' . $exit_code . ');';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_FILE($php_code),
    )),
    dirname(__FILE__) . '/fake-test.phpt'
);
$case->run(new PHPT_Reporter_Null());

$returns = new PHPT_Section_RETURNS($exit_code);
$returns->run($case);

?>
===DONE===
--EXPECT--
===DONE===

