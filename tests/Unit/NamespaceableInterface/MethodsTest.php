<?php

namespace Tests\Unit\NamespaceableInterface;

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
}
