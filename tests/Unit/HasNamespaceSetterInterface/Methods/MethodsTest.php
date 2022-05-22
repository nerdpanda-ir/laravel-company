<?php

namespace Tests\Unit\HasNamespaceSetterInterface\Methods;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;
//@todo create method for get abstract count
//@todo create method for get final count
//@todo create method for get static method || none static methods   count
class MethodsTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
    public function test_should_have_single_method():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $methodsCount = count($methods);
        $this->assertEquals(
            1 , $methodsCount ,
            "interface $this->namespace just should have single method not more !!! "
        );
    }
}
