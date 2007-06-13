<?php

require_once 'Test/Section.php';
require_once 'Test/Util.php';

class Test_Section_Teardown extends Test_Section
{
    protected $_type = 'modify';
    
    public function __construct($php)
    {
        parent::__construct('teardown', $php);
    }
    
    /**
     * @todo refactor the parsing of $input, possibly making run() require an object
     */
    public function run($input)
    {
        return "<?php\n" .
            Test_Util::parse($input) . "\n" .
            $this->php_fragment . "\n" .
            "?>";
    }
}