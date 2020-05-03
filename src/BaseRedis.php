<?php
declare(strict_types=1);

namespace CactusPhpRedis;

class BaseRedis
{
    protected array $data; // key value store / associative array
    private bool $declared = false;
    //private array $list;


    // private - so needed getter setter method here in this class
    // protected array $data;

    public function __construct() {
        $this->data = array();
        //$this->list = array();
        $this->declared = true;
        echo "Base Redis Constructor";
    }

    public function __set($keyName, $value)
    {
        echo "setting key or key-value";
        $this->data[$keyName] = $value;
    }

    public function __get($keyName)
    {
        echo "Getting '$keyName'\n";

        $exists = $this->baseKeyExists($keyName);
        if($exists)
        {
            return $this->data[$keyName];
        }
        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $keyName .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    protected function baseKeyExists($keyName): bool
    {
        return array_key_exists($keyName, $this->data);
    }

    protected function pushListItem($keyName, $value)
    {
        //if key exists then get the value
        //then the value type
        //if array then proceed

        // WILL TRY TO MAKE LPUSH, RPUSH ONE SINGLE METHOD

        // if($position == 'end')
        // {
        //
        // }


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
            // CAN BE MOVED TO A METHOD #1
            $newArray = array();
            array_push($newArray, $value);
            $this->set($keyName, $newArray);
            return $newArray;
        }
    }

    protected function unshiftListItem($keyName, $value)
    {
        $exists = $this->baseKeyExists($keyName);
        if($exists)
        {
            $retrievedKeyValue = $this->get($keyName);
            $result = is_array($retrievedKeyValue) ? array_unshift($retrievedKeyValue, $value) : false;

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
            // CAN BE MOVED TO A METHOD #1
            $newArray = array();
            array_unshift($newArray, $value);
            $this->set($keyName, $newArray);
            return $newArray;
        }
    }

    protected function removeListItem($keyName)
    {
        $exists = $this->baseKeyExists($keyName);
        if($exists)
        {
            $retrievedKeyValue = $this->get($keyName);
            $result = is_array($retrievedKeyValue) ? array_pop($retrievedKeyValue) : false;
        }
    }

    // USE TERNERY OPERATOR IN CASE OF IF ELSE
    // CONFUSION IN TERNERY -> MUST BE RESOLVED


    // TIMEOUT RESOURCE SET
    // something came by - using timestamp and adding logic that
    // after this timstamp the object or whatever will be
    //unset/destructed/removed/deleted

    // INCRBY / DECRBY SEPARATE IMPLEMENTATION
}
