<?php

class Customer
{
    public $type;

    /**
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}