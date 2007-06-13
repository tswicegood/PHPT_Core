<?php

require_once 'Test/Section.php';
require_once 'Test/Util.php';

class Test_Section_Setup extends Test_Section
{
    protected $_type = 'modify';
    
    public function __construct($php)
    {
        parent::__construct('setup', $php);
    }
    
    /**
     * @todo refactor the parsing of $input, possibly making run() require an object
     */
    public function run($input)
    {
        return "<?php\n" .
            $this->php_fragment . "\n" .
            Test_Util::parse($input) . "\n" .
            "?>";
    }
}