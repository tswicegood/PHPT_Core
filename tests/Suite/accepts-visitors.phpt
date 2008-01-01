--TEST--
PHPT_Suite accepts PHPT_Suite_Visitors
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class PHPT_SimpleSuiteVisitor implements PHPT_Suite_Visitor
{
    public function visit(PHPT_Suite $suite) {
        echo __METHOD__, " was called\n";
    }
}

$suite = new PHPT_Suite(array());
$suite->accept(new PHPT_SimpleSuiteVisitor());

?>
===DONE===
--EXPECT--
PHPT_SimpleSuiteVisitor::visit was called
===DONE===

