<?php

require_once 'Test/Section.php';
require_once 'Test/Util.php';

class Test_Section_Setup extends Test_Section
{
    public function __construct($php)
    {
        parent::__construct('setup', $php);
    }
    
    /**
     * @todo refactor the parsing of $source, possibly making run() require an object
     */
    public function run($source)
    {
        return "<?php\n" .
            $this->php_fragment . "\n" .
            Test_Util::parse($source) . "\n" .
            "?>";
    }
}