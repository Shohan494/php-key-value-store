<?php
declare(strict_types=1);

namespace CactusPhpRedis;

class ListRedis extends BaseRedis
{
    public function __construct() {
        parent::__construct();
        echo "List Redis Constructor";
    }

    
}
