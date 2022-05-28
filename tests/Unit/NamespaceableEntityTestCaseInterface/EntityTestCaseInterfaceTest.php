<?php

namespace Tests\Unit\NamespaceableEntityTestCaseInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\Tests\NamespaceableEntityTestCaseInterface;
use App\Contracts\NamespaceableInterface;

class EntityTestCaseInterfaceTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCaseInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue($isExist,"interface $this->namespace doesnt exsit !!!");
    }

    public function test_should_extend_three_interface():void {
        $implements = class_implements($this->namespace);
        $implementsCount = sizeof($implements);
        $expect = 3 ;
        $this->assertEquals($expect ,$implementsCount,"$this->namespace interface should just extend from $expect interface !!!");
    }
    public function test_should_extend_from_NamespaceableInterface():void {
        $implements = class_implements($this-> namespace);
        $interface = NamespaceableInterface::class ;
        $isImplement = in_array($interface,$implements);
        $this->assertTrue($isImplement,"$this->namespace interface should implement $interface !!! ");
    }
}
