<?php

class FoobarSections
{
    public function has($name) {
        return isset($this->$name);
    }
}
