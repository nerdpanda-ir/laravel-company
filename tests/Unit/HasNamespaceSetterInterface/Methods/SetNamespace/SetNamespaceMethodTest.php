<?php

namespace Tests\Unit\HasNamespaceSetterInterface\Methods\SetNamespace;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;

class SetNamespaceMethodTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
    protected string $method = 'setNamespace';
    public function test_method_exist():void {
        $exist = method_exists($this->namespace , $this->method);
        $this->assertTrue(
            $exist ,
            "interface => $this->namespace should have $this->method() method !!! "
        );
    }

    public function test_should_method_is_void(): void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $returnType = (string)$methodReflection->getReturnType();
        $expected = 'void';
        $this->assertEquals(
            $expected, $returnType ,
            "method $this->method() from interface $this->namespace should is void !!!"
        );
    }
}
