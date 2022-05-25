<?php

namespace Tests\Unit\EntityTestCaseClass\Methods\SetNamespace;

use PHPUnit\Framework\TestCase;
use ReflectionProperty;
use Tests\EntityTestCase;

class SetNamespaceTest extends TestCase
{
    protected string $namespace = EntityTestCase::class;
    protected string $method = 'setNamespace';
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace , $this->method);
        $this->assertTrue($isExist,"method $this->method() in $this->namespace is missing ");
    }
    public function test_is_public():void {
        $reflection = new \ReflectionMethod($this->namespace,$this->method);
        $isPublic = $reflection->isPublic();
        $this->assertTrue($isPublic,"method $this->method() in $this->namespace class should be public !!! ");
    }
    public function test_is_no_static():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method) ;
        $isNotStatic = !$reflection->isStatic() ;
        $this->assertTrue($isNotStatic,"method $this->method() in $this->namespace dont be static !!!");
    }
    public function test_is_no_abstract():void {
        $reflection = new \ReflectionMethod($this->namespace, $this->method);
        $isNoAbstract = !$reflection->isAbstract();
        $this->assertTrue($isNoAbstract," method $this->method() in $this->namespace class should is no abstract !!! ");
    }
    public function test_is_no_final():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method) ;
        $isNoFinal = !$reflection->isFinal();
        $this->assertTrue($isNoFinal,"method $this->method() in $this->namespace class dont be final !!! ");
    }
    public function test_should_have_return_type():void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $hasReturnType = $methodReflection->hasReturnType();
        $this->assertTrue($hasReturnType,"method $this->method() from $this->namespace class should have return type !!!");
    }

    public function test_is_void_Return_type():void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        if ($methodReflection->hasReturnType()){
            $expects = ["void"];
            sort($expects,SORT_STRING);
            $expects = implode('|',$expects);
            $returnTypes = (string) $methodReflection->getReturnType();
            $returnTypes = explode("|",$returnTypes);
            sort($returnTypes,SORT_STRING);
            $returnTypes = implode('|',$returnTypes);
            $this->assertEquals($expects , $returnTypes , "return type for method $this->method() from $this->namespace class should is $expects but is $returnTypes");
        }
        else
            $this->fail("no detected any return type for method $this->method() in $this->namespace class !!!");
    }
    public function test_when_call_should_nothing_return():void {
        $object = app()->make($this->namespace);
        $result = app()->call([$object , $this->method],['namespace'=>"welcome"]);
        $this->assertNull($result , "should nothing return method $this->method()() in $this->namespace class !!!");
    }

    public function test_should_set_nerdpanda_to_namespace_property():void {
        $object = app()->make($this->namespace);
        $propertyReflection = new ReflectionProperty($object,'namespace');
        $expect = 'nerdpanda';
        $set = app()->call([$object,$this->method],['namespace'=>$expect]);
        $actual = $propertyReflection->getValue($object);
        $this->assertEquals($expect , $actual , "method $this->method() in $this->namespace should set $expect to namespace property but set $actual ");
        
    }
}
