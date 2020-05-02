<?php
declare(strict_types=1);

namespace ExampleApp;

class BaseRedis
{
    private array $data;
    private bool $declared = false;

    // private protected

    public function __construct() {
        $this->data = array();
        $this->declared = true;
        echo "Base Redis Constructor";
    }

    protected function baseKeyExists($keyname)
    {
        return array_key_exists($keyName, $this->data);
    }
}
