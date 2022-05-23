<?php

namespace Tests\Unit\EntityTestCaseInterface\Methods\SetNamespace\Parameters;

use App\Contracts\Tests\EntityTestCaseInterface;
use PHPUnit\Framework\TestCase;
/*
 * @todo create method for check no type hinted parameter count or
 * type hinted parameter count
 * or union type hinted parameter count
 * */
class ParametersTest extends TestCase
{
    protected string $namespace = EntityTestCaseInterface::class ;
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
