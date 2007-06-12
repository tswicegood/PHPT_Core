<?php

class Test_Runner
{
    public function run($string)
    {
        $file = tempnam(sys_get_temp_dir(), 'phpt');
        file_put_contents($file, $string);
        passthru('php -f ' . $file);
        //@unlink($file);
    }
}