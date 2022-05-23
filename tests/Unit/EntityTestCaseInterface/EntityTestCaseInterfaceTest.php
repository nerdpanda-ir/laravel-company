<?php

namespace Tests\Unit\EntityTestCaseInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\Tests\EntityTestCaseInterface;
use App\Contracts\NamespaceableInterface;

class EntityTestCaseInterfaceTest extends TestCase
{
    protected string $namespace = EntityTestCaseInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue($isExist,"interface $this->namespace doesnt exsit !!!");
    }

    public function test_should_extend_one_interface():void {
        $implements = class_implements($this->namespace);
        $implementsCount = sizeof($implements);
        $this->assertEquals(2,$implementsCount,"$this->namespace interface should just extend from one interface !!!");
    }
}
