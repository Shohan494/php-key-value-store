<?php
declare(strict_types=1);

namespace ExampleApp;

class BaseRedis
{
    //protected array $data;
    private bool $declared = false;

    // private - so needed getter setter method here in this class
    // protected array $data;

    // protected

    public function __construct() {
        $this->data = array();
        $this->declared = true;
        echo "Base Redis Constructor";
    }

    protected function baseKeyExists($keyName): bool
    {
        return array_key_exists($keyName, $this->data);
    }
}
