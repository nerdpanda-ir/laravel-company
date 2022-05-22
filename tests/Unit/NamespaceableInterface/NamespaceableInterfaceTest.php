<?php

namespace Tests\Unit\NamespaceableInterface;

use App\Contracts\HasNamespaceSetterInterface;
use PHPUnit\Framework\TestCase;
use App\Contracts\NamespaceableInterface;
use App\Contracts\HasNamespaceGetterInterface;

class NamespaceableInterfaceTest extends TestCase
{
    protected string $namespace = NamespaceableInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue(
            $isExist ,
            "$this->namespace interface doesnt exist !!! "
        );
    }
    public function test_should_implement_HasNamespaceGetterInterface():void {
        $implements = class_implements($this->namespace);
        $isImplement = in_array(HasNamespaceGetterInterface::class,$implements) ;
        $this->assertTrue(
            $isImplement ,
            "interface $this->namespace should implement ".HasNamespaceGetterInterface::class.' interface !!!'
        );
    }
    public function test_should_implement_HasNamespaceSetterInterface():void {
        $implements = class_implements($this->namespace);
        $isImplement = in_array(HasNamespaceSetterInterface::class , $implements);
        $this->assertTrue(
            $isImplement ,
            "interface $this->namespace should implement ".HasNamespaceSetterInterface::class . ' interface !!! '
        );
    }
}
