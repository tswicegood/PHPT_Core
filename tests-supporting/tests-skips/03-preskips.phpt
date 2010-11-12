--TEST--
This test pre skips
--INI--
mysql.default_host = "this-host-is-overwhelmingly-unlikely-to-be-the-default.example.com"
--PRESKIPIF--
<?php
if (ini_get('mysql.default_host') != "this-host-is-overwhelmingly-unlikely-to-be-the-default.example.com") {
    echo "skip - didn't see the ini setting";
}
?>
--FILE--
<?php

?>
===DONE===
--EXPECT--
===DONE===
