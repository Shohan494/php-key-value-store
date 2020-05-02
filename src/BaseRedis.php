<?php
declare(strict_types=1);

namespace CactusPhpRedis;

class BaseRedis
{
    protected array $data;
    private bool $declared = false;

    // private - so needed getter setter method here in this class
    // protected array $data;

    public function __construct() {
        $this->data = array();
        $this->declared = true;
        echo "Base Redis Constructor";
    }

    public function __set($keyName, $value)
    {
        echo "Setting '$keyName' to '$value'\n";
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

    // USE TERNERY OPERATOR IN CASE OF IF ELSE

    // TIMEOUT RESOURCE SET

    // INCRBY / DECRBY SEPARATE IMPLEMENTATION
}
