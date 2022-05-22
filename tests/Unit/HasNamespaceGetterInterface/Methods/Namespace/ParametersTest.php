<?php

namespace Tests\Unit\HasNamespaceGetterInterface\Methods\Namespace;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceGetterInterface;

class ParametersTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterInterface::class ;
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
