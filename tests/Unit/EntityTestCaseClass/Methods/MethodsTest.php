<?php

namespace Tests\Unit\EntityTestCaseClass\Methods;

use PHPUnit\Framework\TestCase;
use Tests\Unit\EntityTestCase;

class MethodsTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_should_no_have_any_method_in_self():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods();
        $methods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->class==$this->namespace;
        });
        $this->assertEmpty($methods," should no have any method in $this->namespace class !!!");
    }
}
