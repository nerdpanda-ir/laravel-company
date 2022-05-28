<?php

namespace Tests\Unit\NamespaceableTrait\Methods\Namespace;
use App\Traits\NamespaceableTrait;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    protected string $namespace = NamespaceableTrait::class ;
    protected string $method = 'namespace';
    public function test_no_have_any_parameter():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $parameters = $methodReflection->getParameters();
        $this->assertEmpty($parameters , "$this->method() in $this->namespace trait :  should no have any parameter !!! ");
    }
}
