<?php

namespace Tests\Unit\EntityTestCaseInterface\Methods\Namespace;

use PHPUnit\Framework\TestCase;
use App\Contracts\Tests\EntityTestCaseInterface;

class ParametersTest extends TestCase
{
    protected string $namespace = EntityTestCaseInterface::class ;
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
