<?php

namespace Tests\Unit\EntityTestCaseClass;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class NamespacePropertyTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    protected string $property = 'namespace';
    //@todo can create propertiable interface , for class test , trait test, ...
    public function test_should_exist ():void {
        $isExist = property_exists($this->namespace,$this->property);
        $this->assertTrue($isExist,"no exist \$namespace property in $this->namespace ");
    }
    public function test_should_is_Protected():void {
        $namespaceInfo = new \ReflectionProperty($this->namespace , 'namespace');
        $isProtected = $namespaceInfo->isProtected();
        $this->assertTrue($isProtected,"should access modifier for \$namespace property in class => $this->namespace is protected !!! ");
    }
    
    public function test_should_is_string():void{
        //@todo check with union type -> may be have bug
        $namespaceReflection = new \ReflectionProperty($this->namespace , 'namespace');
        $realType = (string)$namespaceReflection->getType();
        $expected = 'string';
        $this->assertEquals($expected ,$realType,"data type for \$namespace property should is string !!! ");
    }
    //@todo check default value
    //@todo check not static
    //@todo check defined class -> should defined in child  !!!!

}
