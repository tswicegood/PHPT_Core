<?php

// @todo make all properties "read-only" (or as read-only as they can be in PHP)
class PHPT_Case
{
    public $sections = null;
    public $output = null;
    private $_filename = '';
    
    public function __construct(PHPT_SectionList $sections, $filename)
    {
        assert('is_string($filename)');
        
        $this->sections = $sections;
        $this->_filename = $filename;
    }
    
    public function __destruct()
    {
        foreach ($this->sections as $section) {
            if (method_exists($section, '__destruct')) {
                $section->__destruct();
            }
        }
    }
    
    public function run(PHPT_Reporter $reporter)
    {
        $reporter->onCaseStart($this);
        try {
            if ($this->sections->filterByInterface('RunnableBefore')->valid()) {
                foreach ($this->sections as $section) {
                    $section->run($this);
                }
            }
            $this->sections->filterByInterface();
            $this->sections->FILE->run($this);
            if ($this->sections->filterByInterface('RunnableAfter')->valid()) {
                foreach ($this->sections as $section) {
                    $section->run($this);
                }
            }
            $reporter->onCasePass($this);
        } catch (PHPT_Case_VetoException $veto) {
            $reporter->onCaseSkip($this, $veto);
        } catch (PHPT_Case_FailureException $failure) {
            $reporter->onCaseFail($this, $failure);
        }
        $this->sections->filterByInterface();
        $reporter->onCaseEnd($this);
    }
    
    public function __set($key, $value)
    {
        switch ($key) {
            case 'leave_file' :
                $this->sections->FILE->leave_file = $value;
                break;
            
            case 'code' :
                $this->sections->FILE->contents = $value;
                break;
        }
    }
    
    public function __get($key)
    {
        switch ($key) {
            case 'name' :
                return (string)$this->sections->TEST;
            
            case 'filename' :
                return $this->_filename;
            
            case 'code' :
                return (string)$this->sections->FILE->contents;
        }
    }
    
    public function is($validator)
    {
        return $this->_validatorFactory($validator)->is($this);
    }
    
    public function validate($validator)
    {
        $this->_validatorFactory($validator)->validate($this);
    }
    
    private function _validatorFactory($validator)
    {
        if (is_string($validator)) {
            $validator_name = "PHPT_Case_Validator_{$validator}";
            $validator = new $validator_name();
        }
        assert('$validator instanceof PHPT_Case_Validator || is_string($validator)');
        return $validator;
    }
}
