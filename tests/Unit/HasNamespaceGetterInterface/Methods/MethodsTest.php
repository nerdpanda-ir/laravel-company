<?php

namespace Tests\Unit\HasNamespaceGetterInterface\Methods;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceGetterInterface;

class MethodsTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterInterface::class ;
    public function test_should_have_single_method():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methodsCount = count($interfaceReflection->getMethods());
        $expected = 1 ;
        $this->assertEquals(
            $expected , $methodsCount ,
            "interface $this->namespace should only have one method !!!"
        );
    }

    public function test_no_have_static_method():void{
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $staticMethods = [];
        foreach ($methods as $method)
            if ($method->isStatic())
                $staticMethods[] = $method ;
        $staticMethodCount = count($staticMethods);
        $this->assertEquals(
             $staticMethodCount , $staticMethodCount ,
            "interface $this->namespace no have any static method !!! "
        );
    }
    //@todo create test methods for static , none staticm method , abstaract check , none abstarct , final , ..
}
