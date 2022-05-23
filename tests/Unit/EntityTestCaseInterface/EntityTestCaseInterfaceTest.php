<?php

namespace Tests\Unit\EntityTestCaseInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\Tests\EntityTestCaseInterface;

class EntityTestCaseInterfaceTest extends TestCase
{
    protected string $namespace = EntityTestCaseInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue($isExist,"interface $this->namespace doesnt exsit !!!");
    }
}
