<?php

namespace Tests\Unit\NamespaceableEntityTestCaseClass\Methods\SetNamespace\Parameters;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class ParametersTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    protected string $method = 'setNamespace';
    public function test_just_have_single_parameter():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $parametersCount = $reflection->getNumberOfParameters();
        $this->assertEquals(1,$parametersCount,"method $this->method in $this->namespace should only one parameter");
    }
}
