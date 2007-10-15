--TEST--
The Expectregex section should match a fragment even in noise
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$random = rand(100, 199);
$case = new PHPT_SimpleTestCase();
$case->output = <<<END
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris id enim. Vestibulum euismod
purus condimentum massa. Nullam mauris. Integer justo. Vestibulum ante ipsum primis in
faucibus orci luctus et ultrices posuere cubilia Curae; Aenean et arcu. Aenean quis erat
eu orci tincidunt iaculis. Nullam rhoncus pellentesque lacus. Maecenas dui purus, cursus
Random Int: {$random}
et, sodales luctus, pellentesque a, sem. Donec lobortis justo id erat volutpat euismod.
Praesent elementum. Phasellus sagittis erat in enim. Vivamus tortor nulla, malesuada ut,
mollis in, condimentum et, ante. Suspendisse dui turpis, aliquam sed, ultricies id, facilisis
nec, velit. Duis cursus turpis vitae nisi.
END;

$section = new PHPT_Section_Expectregex('.*Random Int: 1[0-9]{2}.*');
$section->run($case);

// this one should not match
$section = new PHPT_Section_Expectregex('/^Random Int: 1[0-9]{2}.*/');
try {
    $section->run($case);
} catch (PHPT_Section_Expectregex_UnexpectedOutputException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===
