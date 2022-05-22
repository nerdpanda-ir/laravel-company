<?php

namespace Tests\Unit\HasNamespaceSetterInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;

class SetNamespaceMethodParametersTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
    protected string $method = 'setNamespace';
    public function test_should_just_have_single_parameter():void {
        $methodReflection = new \ReflectionMethod($this->namespace, $this->method);
        $parametersCount = $methodReflection->getNumberOfParameters();
        $this->assertEquals(
            1 , $parametersCount ,
            "method $this->method() in interface $this->namespace ->  just should have single parameter !!! "
        );
    }
}
