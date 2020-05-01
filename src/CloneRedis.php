<?php
declare(strict_types=1);

namespace ExampleApp;

class CloneRedis
{
    private $data = array();
    private bool $declared = false;

    public function __construct() {
        //$this->declared = true;
    }

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function get($keyName)
    {
        return $this->__get($keyName);
    }

    public function set($keyName, $keyValue)
    {
        $this->__set($keyName, $keyValue);
    }

    public function viewStore()
    {
        return $this->getCurrentStore();
    }

    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    private function getCurrentStore()
    {
        echo "called getCurrentStore \n";
        return $this->data;
    }

    // public function __call($name, $arguments)
    // {
    //     // Note: value of $name is case sensitive.
    //     echo "Calling object method '$name' "
    //          . implode(', ', $arguments). "\n";
    // }
    //
    // public static function __callStatic($name, $arguments)
    // {
    //     echo "Calling static method '$name' "
    //          . implode(', ', $arguments). "\n";
    // }


}
