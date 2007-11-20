--TEST--
The Section objects are returned in the order of their getPriority() return value
(lowest returns first).
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class PHPT_SimpleFirstSection implements PHPT_Section_Runnable
{
    public function run(PHPT_Case $case) { }
    public function getPriority() {
        return 1;
    }
}

class PHPT_SimpleSecondSection implements PHPT_Section_Runnable
{
    public function run(PHPT_Case $case) { }
    public function getPriority() {
        return 2;
    }
}

$sections = new PHPT_SectionList(array(
    new PHPT_SimpleSecondSection(),
    new PHPT_SimpleFirstSection(),
));

assert('$sections->current() instanceof PHPT_SimpleFirstSection');
$sections->next();
assert('$sections->current() instanceof PHPT_SimpleSecondSection');

?>
===DONE===
--EXPECT--
===DONE===
