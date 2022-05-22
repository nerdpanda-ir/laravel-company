<?php

namespace Tests\Unit\HasNamespaceSetterInterface\Methods\SetNamespace\Parameters;

use App\Contracts\HasNamespaceSetterInterface;
use PHPUnit\Framework\TestCase;

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
