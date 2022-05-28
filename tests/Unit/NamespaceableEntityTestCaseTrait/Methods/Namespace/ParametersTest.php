<?php
namespace Tests\Unit\NamespaceableTrait\Methods\Namespace;

use PHPUnit\Framework\TestCase;
use App\Traits\Tests\NamespaceableEntityTestCaseTrait;

class ParametersTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCaseTrait::class ;
    protected string $method = 'namespace';
    public function test_no_have_any_parameter():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $parameters = $methodReflection->getParameters();
        $this->assertEmpty($parameters , "$this->method() in $this->namespace trait :  should no have any parameter !!! ");
    }
}
