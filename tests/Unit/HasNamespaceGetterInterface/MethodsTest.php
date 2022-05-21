<?php

namespace Tests\Unit\HasNamespaceGetterInterface;

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
}
