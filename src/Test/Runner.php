<?php

require_once 'Test/File.php';

class Test_Runner
{
    public function run(Test_File $file)
    {
        passthru('php -f ' . $file->filename);
        //@unlink($file);
    }
}