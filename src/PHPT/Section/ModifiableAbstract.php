<?php

/**
 * @todo create mock class and implementation below directly instead of by proxy via ENV/FILE
 *       sub-classes
 */
abstract class PHPT_Section_ModifiableAbstract implements PHPT_Section_Runnable
{
    private $_modifier_name = '';
    
    public function __construct($data)
    {
        $this->_modifier_name = substr(get_class($this), 13);
    }
    
    public function run(PHPT_Case $case)
    {
        $sections = clone $case->sections;
        if ($sections->filterByInterface($this->_modifier_name . 'Modifier')->valid()) {
            $modifyMethod = 'modify' . $this->_modifier_name;
            foreach ($sections as $section) {
                $section->$modifyMethod($this);
            }
        }
    }
    
    public function getPriority()
    {
        
    }
}
