<?php

namespace Tests\Unit\NamespaceableTrait\Methods\SetNamespace\Parameters;

use App\Traits\NamespaceableTrait;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    protected string $namespace = NamespaceableTrait::class ;
    protected string $method = 'setNamespace';
    public function test_just_have_single_parameter():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $parametersCount = $reflection->getNumberOfParameters();
        $this->assertEquals(1,$parametersCount,"method $this->method in $this->namespace trait should only one parameter");
    }
}
