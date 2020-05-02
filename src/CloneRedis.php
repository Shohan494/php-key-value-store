<?php
declare(strict_types=1);

namespace CactusPhpRedis;

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

    public function set($keyName, $keyValue = null)
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

    public function rpush($keyName, $value)
    {
        echo "rpush to list";

        //if key exists then get the value
        //then the value type
        //if array then proceed

        $exists = $this->baseKeyExists($keyName);
        if($exists)
        {
            $retrievedKeyValue = $this->get($keyName);
            $result = is_array($retrievedKeyValue) ? array_push($retrievedKeyValue, $value) : false;

            if($result)
            {
                $this->set($keyName, $retrievedKeyValue);
                return $retrievedKeyValue;
            }
            else
            {
                // not sure right now what to do
            }
        }
        else
        {
            //else we create the new array and then push the data and then set the key as value with the array

            $newArray = array();
            array_push($newArray, $value);
            $this->set($keyName, $newArray);
            return $newArray;
        }
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
