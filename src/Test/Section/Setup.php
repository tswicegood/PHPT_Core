<?php

require_once 'Test/Section.php';

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
        $exploded_source = explode("\n", $source);
        $source = array_shift($exploded_source);
        
        preg_match('/^<\?(php)?(.*)\?>$/', $source, $matches);
        if (!empty($matches[2])) {
            $exploded_source = array_unshift($exploded_source, $matches[2]);
        }
        $source = array_pop($exploded_source);
        unset($matches);
        preg_match('/^(.*)(\?>)$/', $source, $matches);
        if (!empty($matches[1])) {
            $exploded_source = array_push($exploded_source, $matches[1]);
        }
        
        $source_fragment = implode("\n", $exploded_source);
        $source = "<?php\n" .
            $this->php_fragment . "\n" .
            $source_fragment . "\n" .
            "?>";
        return $source;
    }
}