<?php
declare(strict_types=1);

namespace ExampleApp;

class CloneRedis extends BaseRedis
{
    public function __construct() {
        parent::__construct();
        echo "Clone Redis Constructor";
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

    public function __isset($keyName)
    {
        echo "Is '$keyName' set?\n";
        return isset($this->data[$keyName]);
    }

    public function __unset($keyName)
    {
        echo "Unsetting '$keyName'\n";
        unset($this->data[$keyName]);
    }

    public function delete($keyName)
    {
        $this->__unset($keyName);
    }

    private function getCurrentStore()
    {
        echo "called getCurrentStore \n";
        return $this->data;
    }

    public function exists($keyName): int
    {
        $exists = $this->baseKeyExists($keyName);
        if($exists)
        {
            return 1;
        }
        return 0;
    }


    public function increment($keyName, $incrementalValue = 1)
    {
        $exists = $this->baseKeyExists($keyName) ?  $this->set($keyName, $this->get($keyName) + $incrementalValue) : $this->set($keyName, $incrementalValue);
    }

    public function decrement($keyName, $decrementalValue = 0)
    {
        $exists = $this->baseKeyExists($keyName) ?  $this->set($keyName, $this->get($keyName) - $decrementalValue) : $this->set($keyName, 0 - $decrementalValue) ;
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
