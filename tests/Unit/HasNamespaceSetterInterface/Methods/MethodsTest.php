<?php

namespace Tests\Unit\HasNamespaceSetterInterface\Methods;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;

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
