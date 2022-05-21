<?php

namespace Tests\Unit\HasNamespaceSetterInterface;

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
    //@todo return type should be check
    //@todo create method parameter test class , parametr position check , parameter count
    public function test_method_should_have_namespace_parameter():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $requiredParameter = 'namespace';
        $parameters = [] ;
        foreach ($methodReflection->getParameters() as  $parameter)
            $parameters[] = $parameter->name;
        $exist = in_array($requiredParameter , $parameters );
        $this->assertTrue($exist,"method => $this->method () from interface => $this->namespace should have \$$requiredParameter");
    }
}
