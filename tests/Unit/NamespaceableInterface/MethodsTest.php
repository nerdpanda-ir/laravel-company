<?php

namespace Tests\Unit\NamespaceableInterface;

use App\Contracts\HasNamespaceGetterInterface;
use PHPUnit\Framework\TestCase;
use App\Contracts\NamespaceableInterface ;

class MethodsTest extends TestCase
{
    protected string $namespace = NamespaceableInterface::class ;
    public function test_should_no_have_method():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $interfaceMethods = [];
        foreach ($methods as $method)
            if ($method->class==$this->namespace)
                $interfaceMethods[] = $method ;
        $interfaceMethodsCount = count($interfaceMethods);
        $this->assertEquals(
            0 , $interfaceMethodsCount ,
            "$this->namespace should no declare method !!! "
        );
    }

    public function test_should_have_two_method_from_parents():void {
        $parents = class_implements($this->namespace);
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods() ;
        $counter = 0 ;
        foreach ($methods as $method)
            if (in_array($method->class,$parents))
                $counter++;
        $this->assertEquals(
            2,$counter ,
            "$this->namespace should have two method from parent "
        );
    }
    public function test_should_have_one_method_from_HasNamespaceGetterInterface():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $counter = 0 ;
        foreach ($methods as $method)
            if ($method->class==HasNamespaceGetterInterface::class)
                $counter++;
        $this->assertEquals(
            2,$counter,
            "interface $this->namespace should only have one method from ".HasNamespaceGetterInterface::class.' interface'
        );
    }
}
