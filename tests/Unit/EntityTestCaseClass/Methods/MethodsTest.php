<?php

namespace Tests\Unit\EntityTestCaseClass\Methods;

use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\Caster\ReflectionCaster;
use Tests\EntityTestCase;

class MethodsTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_no_have_method_in_self():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $methods = $classReflection->getMethods();
        $selfMethods = [] ;
        foreach ($methods as $method)
            if ($method->class==$this->namespace)
                $selfMethods[] = $method->name.'()';
        $selfMethodsCount = count($selfMethods);
        $message = '';
        if (!empty($selfMethods)) {
            if ($selfMethodsCount==1)
                $message = "method $selfMethods[0] " ;
            else
                $message = "methods ".implode(', ',$selfMethods) ;
            $message .= " should remove from $this->namespace . " ;
        }
        $this->assertEmpty($selfMethods,$message);
    }
}
