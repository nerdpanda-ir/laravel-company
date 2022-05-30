<?php

namespace Tests\Unit\App\Contracts;

use PHPUnit\Framework\TestCase;
use App\Contracts\HomeControllerInterface;

class HomeControllerInterfaceTest extends TestCase
{
    protected string $namespace = HomeControllerInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue($isExist,"missing $this->namespace interface !!");
    }
}
