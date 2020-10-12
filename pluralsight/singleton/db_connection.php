<?php

class DBConnection
{

    private function __construct()
    {
        echo "New object create<br>";
    }

    public static function getInstance()
    {
        //only if this instance is now, the same object
        //will be created
        static $instance = null;

        if (null == $instance) {
            $instance = new static();
        } else {
            echo "Using same object<br>";
        }

        return $instance;
    }
}
