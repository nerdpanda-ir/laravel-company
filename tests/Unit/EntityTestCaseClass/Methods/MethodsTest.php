<?php

namespace Tests\Unit\EntityTestCaseClass\Methods;

use App\Traits\HasNamespaceGetterTrait;
use PHPUnit\Framework\TestCase;
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
    public function test_should_have_double_method_from_use_traits():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $methods = $classReflection->getMethods();
        $uses = class_uses($this->namespace);
        $counter = 0 ;
        foreach ($methods as $method)
            if (in_array($method->class,$uses))
                $counter++;
        $this->assertEquals(2,$counter,"$this->namespace class should have two method from used traits !!! ");
    }
    public function test_should_have_one_method_from_HasNamespaceGetterTrait():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $methods = $classReflection->getMethods();
        $counter = 0 ;
        foreach ($methods as $method)
            if ($method->class==HasNamespaceGetterTrait::class)
                $counter++;
        $this->assertEquals(1,$counter,"$this->namespace class should just have one method from trait ".HasNamespaceGetterTrait::class);
    }
}
