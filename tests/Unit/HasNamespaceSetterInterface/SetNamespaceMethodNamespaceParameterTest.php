<?php

namespace Tests\Unit\HasNamespaceSetterInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;
class SetNamespaceMethodNamespaceParameterTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
    protected string $method = 'setNamespace';
    protected string $parameter = 'namespace';
    //@todo create method parameter test class , parametr position check , parameter count , parameter type check
    public function test_parameter_is_exist(): void
    {
        $methodReflection = new \ReflectionMethod($this->namespace, $this->method);
        $parameters = [];
        foreach ($methodReflection->getParameters() as $parameter)
            $parameters[] = $parameter->name;
        $exist = in_array($this->parameter, $parameters);
        $this->assertTrue($exist, "method => $this->method () from interface => $this->namespace should have \$$this->parameter");
    }
}
