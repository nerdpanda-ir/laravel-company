<?php

namespace Tests\Unit\NamespaceableTestCaseClass\Properties;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;
//@todo create method for static properties count check
//@todo create method for none static properties count check
//@todo create method for const | final  properties count check
class PropertiesTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_should_only_single_property():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $properties = $classReflection->getProperties();
        $classProperties = [];
        foreach ($properties as $property)
            if ($property->class==$this->namespace)
                $classProperties[] = $property->name;
        $classPropertiesCount = count($classProperties);
        $expected = 1 ;
        $this->assertEquals(
            $expected ,
            $classPropertiesCount ,
            "class : $this->namespace just should have single property !!! "
        );
    }
    public function test_should_have_protected_property():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $properties = $classReflection->getProperties();
        $noneProtectedProperties = array_filter($properties , function (\ReflectionProperty $property){
            return !$property->isProtected() and $property->class==$this->namespace;
        });
        $noneProtectedProperties = array_map(function (\ReflectionProperty $property){return '$'.$property->name;},$noneProtectedProperties);
        $noneProtectedPropertiesCount = count($noneProtectedProperties);
        $message = '';
        if (!empty($noneProtectedProperties)){
            if ($noneProtectedPropertiesCount==1)
                $message = "property $noneProtectedProperties[0] ";
            else
                $message = 'properties '.implode(' , ',$noneProtectedProperties);
            $message .= " in $this->namespace should is protected ";
        }
        $this->assertEmpty($noneProtectedProperties,$message);
    }
    public function test_no_have_static_property():void{
        $classReflection = new \ReflectionClass($this->namespace);
        $properties = $classReflection->getProperties();
        $staticProperties = [] ;
        foreach ($properties as $property)
            if ($property->class==$this->namespace and $property->isStatic())
                $staticProperties[] = $property->name;
        $staticPropertiesCount = count($staticProperties);
        $this->assertEquals(
            0 ,
            $staticPropertiesCount ,
            "class $this->namespace should have 0 static property !!!! "
        );
    }
    public function test_should_have_one_none_static_property():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $properties = $classReflection->getProperties();
        $noneStaticProperties = [];
        foreach ($properties as $property)
            if ($property->class==$this->namespace and !$property->isStatic())
                $noneStaticProperties[] = $property->name;
        $noneStaticPropertiesCount = count($noneStaticProperties);
        $this->assertEquals(
            1 , $noneStaticPropertiesCount ,
            "class $this->namespace should has just one none static property !!! "
        );
    }
}
