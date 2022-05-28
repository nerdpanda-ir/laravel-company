<?php

namespace Tests\Unit\NamespaceableEntityTestCaseInterface\Methods\Namespace;

use PHPUnit\Framework\TestCase;
use App\Contracts\Tests\NamespaceableEntityTestCaseInterface;

class ParametersTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCaseInterface::class ;
    protected string $method = 'namespace';
    public function test_never_exist_parameter():void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $parametersCount = $methodReflection->getNumberOfParameters() ;
        $this->assertEquals(
            0 , $parametersCount ,
            "method $this->method() from interface $this->namespace should have 0 parameter"
        );
    }
}
