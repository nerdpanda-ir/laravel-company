<?php

namespace Tests\Unit\NamespaceableEntityTestCaseTrait\Methods\SetNamespace\Parameters;


use App\Traits\Tests\NamespaceableEntityTestCaseTrait;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCaseTrait::class ;
    protected string $method = 'setNamespace';
    public function test_just_have_single_parameter():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $parametersCount = $reflection->getNumberOfParameters();
        $this->assertEquals(1,$parametersCount,"method $this->method in $this->namespace trait should only one parameter");
    }
}
