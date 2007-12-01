--TEST--
If phpt file has Windows EOLs, it should still parse properly.

A work around for PHP bug 43474 and a fixes Issue 4 in the code tracker
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$code = "--TEST--\r\n" .
        "foobar\r\n" .
        "--FILE--\r\n" .
        "hello world\r\n" .
        "--EXPECT--\r\n" .
        "hello world\r\n";

file_put_contents(dirname(__FILE__) . '/foobar.php', $code);

$parser = new PHPT_Case_Parser();
$case = $parser->parse(dirname(__FILE__) . '/foobar.php');

assert('$case instanceof PHPT_Case');

?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===

