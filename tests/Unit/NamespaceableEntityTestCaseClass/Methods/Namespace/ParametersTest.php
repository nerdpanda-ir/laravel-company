<?php

namespace Tests\Unit\NamespaceableEntityTestCaseClass\Methods\Namespace;

use PHPUnit\Framework\TestCase;
use Tests\NamespaceableEntityTestCase;

class ParametersTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCase::class ;
    protected string $method = 'namespace';
    public function test_no_have_any_parameter():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $parameters = $methodReflection->getParameters();
        $this->assertEmpty($parameters , "$this->method() in $this->namespace class :  should no have any parameter !!! ");
    }
}
